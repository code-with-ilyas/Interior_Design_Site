<?php

namespace Tests\Unit;

use App\Enums\RenovationCategory;
use App\Enums\RenovationIntent;
use App\Models\RenovationSubmission;
use App\Services\RenovationSubmissionService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class RenovationSubmissionServiceTest extends TestCase
{
    use RefreshDatabase;

    protected RenovationSubmissionService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new RenovationSubmissionService();
    }

    public function test_prepare_form_data_formats_step_responses_correctly(): void
    {
        $category = RenovationCategory::PARTIAL_RENOVATION;
        $stepResponses = [
            1 => 'bathroom',
            2 => 'under-10k',
            3 => 'Test details',
        ];

        $formData = $this->service->prepareFormData($category, $stepResponses);

        $this->assertIsArray($formData);
        $this->assertCount(3, $formData);

        // Check first step
        $this->assertEquals(1, $formData[0]['step_number']);
        $this->assertEquals('Room Selection', $formData[0]['title']);
        $this->assertEquals('bathroom', $formData[0]['response']);
        $this->assertEquals('radio', $formData[0]['input_type']);
    }

    public function test_update_status_accepts_valid_statuses(): void
    {
        $submission = RenovationSubmission::create([
            'intent' => 'quote',
            'category_slug' => 'partial-renovation',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'form_data_json' => json_encode([]),
            'status' => 'pending',
        ]);

        $result = $this->service->updateStatus($submission, 'reviewed');

        $this->assertTrue($result);
        $this->assertEquals('reviewed', $submission->fresh()->status);
    }

    public function test_update_status_rejects_invalid_statuses(): void
    {
        $submission = RenovationSubmission::create([
            'intent' => 'quote',
            'category_slug' => 'partial-renovation',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'form_data_json' => json_encode([]),
            'status' => 'pending',
        ]);

        $result = $this->service->updateStatus($submission, 'invalid_status');

        $this->assertFalse($result);
        $this->assertEquals('pending', $submission->fresh()->status);
    }

    public function test_export_to_csv_generates_correct_format(): void
    {
        $submissions = collect([
            RenovationSubmission::create([
                'intent' => 'quote',
                'category_slug' => 'partial-renovation',
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john@example.com',
                'phone' => '1234567890',
                'form_data_json' => json_encode([]),
                'status' => 'pending',
            ]),
        ]);

        $csv = $this->service->exportToCsv($submissions);

        $this->assertStringContainsString('ID,Intent,Category,Name,Email,Phone,Status,Submitted At', $csv);
        $this->assertStringContainsString('John', $csv);
        $this->assertStringContainsString('Doe', $csv);
        $this->assertStringContainsString('john@example.com', $csv);
        $this->assertStringContainsString('1234567890', $csv);
    }

    public function test_create_submission_stores_all_required_fields(): void
    {
        Mail::fake();

        session(['renovation.intent' => 'quote']);

        $category = RenovationCategory::PARTIAL_RENOVATION;
        $userInfo = [
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'email' => 'jane@example.com',
            'phone' => '9876543210',
            'address' => '123 Main St',
            'city' => 'Paris',
            'postal_code' => '75001',
        ];
        $stepResponses = [
            1 => 'bathroom',
            2 => 'under-10k',
        ];

        $submission = $this->service->createSubmission($category, $userInfo, $stepResponses);

        $this->assertInstanceOf(RenovationSubmission::class, $submission);
        $this->assertEquals('quote', $submission->intent);
        $this->assertEquals('partial-renovation', $submission->category_slug);
        $this->assertEquals('Jane', $submission->first_name);
        $this->assertEquals('Smith', $submission->last_name);
        $this->assertEquals('jane@example.com', $submission->email);
        $this->assertEquals('9876543210', $submission->phone);
        $this->assertEquals('pending', $submission->status);
        $this->assertNotNull($submission->form_data_json);
    }
}
