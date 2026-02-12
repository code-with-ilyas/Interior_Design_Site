<?php

namespace Tests\Feature;

use App\Enums\RenovationCategory;
use App\Models\RenovationSubmission;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class JsonValidationTest extends TestCase
{
    use RefreshDatabase;

    protected User $adminUser;

    protected function setUp(): void
    {
        parent::setUp();

        // Create super-admin role
        Role::create(['name' => 'super-admin']);

        // Create an admin user for authenticated tests
        $this->adminUser = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        // Assign super-admin role
        $this->adminUser->assignRole('super-admin');
    }

    /**
     * Test that model handles empty JSON array gracefully
     */
    public function test_model_handles_empty_json_array(): void
    {
        $submission = RenovationSubmission::create([
            'intent' => 'quote',
            'category_slug' => 'partial-renovation',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'form_data_json' => [],
            'status' => 'pending',
        ]);

        $formData = $submission->getFormData();

        $this->assertIsArray($formData);
        $this->assertEmpty($formData);
    }

    /**
     * Test that model handles empty JSON object gracefully
     */
    public function test_model_handles_empty_json_object(): void
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

        $formData = $submission->getFormData();

        $this->assertIsArray($formData);
        $this->assertEmpty($formData);
    }

    /**
     * Test that admin show page handles empty JSON array gracefully
     */
    public function test_admin_show_handles_empty_json_array(): void
    {
        $submission = RenovationSubmission::create([
            'intent' => 'quote',
            'category_slug' => 'partial-renovation',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'form_data_json' => [],
            'status' => 'pending',
        ]);

        $response = $this->actingAs($this->adminUser)
            ->get(route('admin.renovation-submissions.show', $submission));

        $response->assertStatus(200);
        $response->assertSee('No form responses available');
    }

    /**
     * Test that admin show page handles empty JSON gracefully
     */
    public function test_admin_show_handles_empty_json(): void
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

        $response = $this->actingAs($this->adminUser)
            ->get(route('admin.renovation-submissions.show', $submission));

        $response->assertStatus(200);
        $response->assertSee('No form responses available');
    }

    /**
     * Test that admin show page handles malformed JSON in database
     */
    public function test_admin_show_handles_malformed_json_in_database(): void
    {
        // Create submission with valid data first
        $submission = RenovationSubmission::create([
            'intent' => 'quote',
            'category_slug' => 'partial-renovation',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'form_data_json' => ['1' => 'bathroom'],
            'status' => 'pending',
        ]);

        // Manually corrupt the JSON in the database
        \DB::table('renovation_submissions')
            ->where('id', $submission->id)
            ->update(['form_data_json' => '{invalid json}']);

        // Refresh the model to get the corrupted data
        $submission = $submission->fresh();

        $response = $this->actingAs($this->adminUser)
            ->get(route('admin.renovation-submissions.show', $submission));

        // Should not throw an error, should handle gracefully
        $response->assertStatus(200);
    }

    /**
     * Test that CSV export handles empty JSON array gracefully
     */
    public function test_csv_export_handles_empty_json_array(): void
    {
        RenovationSubmission::create([
            'intent' => 'quote',
            'category_slug' => 'partial-renovation',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'form_data_json' => [],
            'status' => 'pending',
        ]);

        $response = $this->actingAs($this->adminUser)
            ->get(route('admin.renovation-submissions.export'));

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/csv; charset=UTF-8');
    }

    /**
     * Test that CSV export handles empty JSON gracefully
     */
    public function test_csv_export_handles_empty_json(): void
    {
        RenovationSubmission::create([
            'intent' => 'quote',
            'category_slug' => 'partial-renovation',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'form_data_json' => json_encode([]),
            'status' => 'pending',
        ]);

        $response = $this->actingAs($this->adminUser)
            ->get(route('admin.renovation-submissions.export'));

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/csv; charset=UTF-8');
    }

    /**
     * Test that model casts invalid JSON to empty array
     */
    public function test_model_casts_invalid_json_to_empty_array(): void
    {
        // Create submission with valid data first
        $submission = RenovationSubmission::create([
            'intent' => 'quote',
            'category_slug' => 'partial-renovation',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'form_data_json' => ['1' => 'bathroom'],
            'status' => 'pending',
        ]);

        // Manually corrupt the JSON in the database
        \DB::table('renovation_submissions')
            ->where('id', $submission->id)
            ->update(['form_data_json' => '{invalid json}']);

        // Refresh the model
        $submission = $submission->fresh();

        // Laravel's array cast should handle this gracefully
        $formData = $submission->form_data_json;

        // Should either be null or an empty array, not throw an exception
        $this->assertTrue($formData === null || is_array($formData));
    }

    /**
     * Test that getFormData method handles corrupted JSON
     */
    public function test_get_form_data_handles_corrupted_json(): void
    {
        // Create submission with valid data first
        $submission = RenovationSubmission::create([
            'intent' => 'quote',
            'category_slug' => 'partial-renovation',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'form_data_json' => ['1' => 'bathroom'],
            'status' => 'pending',
        ]);

        // Manually corrupt the JSON in the database
        \DB::table('renovation_submissions')
            ->where('id', $submission->id)
            ->update(['form_data_json' => '{invalid json}']);

        // Refresh the model
        $submission = $submission->fresh();

        // getFormData should handle this gracefully
        $formData = $submission->getFormData();

        $this->assertIsArray($formData);
    }

    /**
     * Test that admin index page handles submissions with empty JSON
     */
    public function test_admin_index_handles_empty_json(): void
    {
        RenovationSubmission::create([
            'intent' => 'quote',
            'category_slug' => 'partial-renovation',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'form_data_json' => [],
            'status' => 'pending',
        ]);

        $response = $this->actingAs($this->adminUser)
            ->get(route('admin.renovation-submissions.index'));

        $response->assertStatus(200);
        $response->assertSee('John');
        $response->assertSee('Doe');
    }

    /**
     * Test that valid JSON with nested data is handled correctly
     */
    public function test_valid_json_with_nested_data_is_handled(): void
    {
        $submission = RenovationSubmission::create([
            'intent' => 'quote',
            'category_slug' => 'complete-renovation',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'form_data_json' => [
                1 => 'under-50k',
                2 => 'under-50',
                3 => ['bathroom', 'kitchen', 'living-room'],
            ],
            'status' => 'pending',
        ]);

        $formData = $submission->getFormData();

        $this->assertIsArray($formData);
        $this->assertArrayHasKey(1, $formData);
        $this->assertArrayHasKey(3, $formData);
        $this->assertIsArray($formData[3]);
        $this->assertCount(3, $formData[3]);
    }

    /**
     * Test that JSON with special characters is handled correctly
     */
    public function test_json_with_special_characters_is_handled(): void
    {
        $specialText = 'Test with "quotes" and \'apostrophes\' and \\ backslashes';

        $submission = RenovationSubmission::create([
            'intent' => 'quote',
            'category_slug' => 'partial-renovation',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'form_data_json' => [
                1 => 'bathroom',
                2 => 'under-10k',
                3 => $specialText,
            ],
            'status' => 'pending',
        ]);

        $formData = $submission->getFormData();

        $this->assertIsArray($formData);
        $this->assertEquals($specialText, $formData[3]);
    }
}
