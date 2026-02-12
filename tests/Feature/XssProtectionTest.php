<?php

namespace Tests\Feature;

use App\Models\RenovationSubmission;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class XssProtectionTest extends TestCase
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

        // Assign super-admin role (using Spatie Laravel Permission)
        $this->adminUser->assignRole('super-admin');
    }

    /**
     * Test that HTML/JavaScript in form responses is escaped in form step view
     */
    public function test_form_step_escapes_previous_response_with_html(): void
    {
        session(['renovation.intent' => 'quote']);

        // Submit a step with HTML/JavaScript content
        $maliciousInput = '<script>alert("XSS")</script><b>Bold Text</b>';

        $this->post('/renovate/partial-renovation/3', [
            'response' => $maliciousInput,
        ]);

        // Navigate back to the step
        $response = $this->get('/renovate/partial-renovation/3');

        $response->assertStatus(200);

        // Verify the raw HTML/JavaScript is NOT present (would be executed)
        $response->assertDontSee('<script>alert("XSS")</script>', false);
        $response->assertDontSee('<b>Bold Text</b>', false);

        // Verify the escaped version IS present (safe to display)
        $response->assertSee('&lt;script&gt;alert(&quot;XSS&quot;)&lt;/script&gt;', false);
        $response->assertSee('&lt;b&gt;Bold Text&lt;/b&gt;', false);
    }

    /**
     * Test that HTML/JavaScript in user info is escaped in admin view
     */
    public function test_admin_show_view_escapes_user_input_with_html(): void
    {
        $maliciousName = '<script>alert("XSS")</script>';
        $maliciousEmail = 'test@example.com<img src=x onerror=alert(1)>';
        $maliciousAddress = '<iframe src="evil.com"></iframe>';

        $submission = RenovationSubmission::create([
            'intent' => 'quote',
            'category_slug' => 'partial-renovation',
            'first_name' => $maliciousName,
            'last_name' => 'Doe',
            'email' => $maliciousEmail,
            'address' => $maliciousAddress,
            'city' => '<b>Paris</b>',
            'postal_code' => '75001',
            'form_data_json' => [
                1 => 'bathroom',
                2 => 'under-10k',
            ],
            'status' => 'pending',
        ]);

        $response = $this->actingAs($this->adminUser)
            ->get(route('admin.renovation-submissions.show', $submission));

        $response->assertStatus(200);

        // Verify raw HTML/JavaScript is NOT present
        $response->assertDontSee('<script>alert("XSS")</script>', false);
        $response->assertDontSee('<img src=x onerror=alert(1)>', false);
        $response->assertDontSee('<iframe src="evil.com"></iframe>', false);
        $response->assertDontSee('<b>Paris</b>', false);

        // Verify escaped versions ARE present
        $response->assertSee('&lt;script&gt;alert(&quot;XSS&quot;)&lt;/script&gt;', false);
        $response->assertSee('&lt;iframe src=&quot;evil.com&quot;&gt;&lt;/iframe&gt;', false);
        $response->assertSee('&lt;b&gt;Paris&lt;/b&gt;', false);
    }

    /**
     * Test that HTML/JavaScript in form responses is escaped in admin view
     */
    public function test_admin_show_view_escapes_form_responses_with_html(): void
    {
        $maliciousResponse = '<script>document.cookie</script>';

        $submission = RenovationSubmission::create([
            'intent' => 'quote',
            'category_slug' => 'partial-renovation',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'form_data_json' => [
                1 => 'bathroom',
                2 => 'under-10k',
                3 => $maliciousResponse,
            ],
            'status' => 'pending',
        ]);

        $response = $this->actingAs($this->adminUser)
            ->get(route('admin.renovation-submissions.show', $submission));

        $response->assertStatus(200);

        // Verify raw script is NOT present
        $response->assertDontSee('<script>document.cookie</script>', false);

        // Verify escaped version IS present
        $response->assertSee('&lt;script&gt;document.cookie&lt;/script&gt;', false);
    }

    /**
     * Test that HTML/JavaScript in email templates is escaped
     */
    public function test_admin_email_escapes_user_input_with_html(): void
    {
        Mail::fake();

        session(['renovation.intent' => 'quote']);

        // Complete form with malicious input
        $this->post('/renovate/partial-renovation/1', ['response' => 'bathroom']);
        $this->post('/renovate/partial-renovation/2', ['response' => 'under-10k']);
        $this->post('/renovate/partial-renovation/3', [
            'response' => '<script>alert("XSS in email")</script>',
        ]);

        // Submit with malicious user info
        $response = $this->post('/renovate/partial-renovation/submit', [
            'first_name' => '<b>John</b>',
            'last_name' => 'Doe<script>alert(1)</script>',
            'email' => 'john@example.com',
            'phone' => '1234567890',
        ]);

        $response->assertRedirect('/renovate/success');

        // Get the submission
        $submission = RenovationSubmission::latest()->first();

        // Get the decoded form data
        $formData = $submission->getFormData();

        // Render the email view
        $emailView = view('emails.renovation-admin', [
            'submission' => $submission,
            'intent' => \App\Enums\RenovationIntent::from($submission->intent),
            'category' => \App\Enums\RenovationCategory::from($submission->category_slug),
            'formData' => $formData,
        ])->render();

        // Verify raw HTML/JavaScript is NOT in the rendered email
        $this->assertStringNotContainsString('<script>alert("XSS in email")</script>', $emailView);
        $this->assertStringNotContainsString('<b>John</b>', $emailView);
        $this->assertStringNotContainsString('<script>alert(1)</script>', $emailView);

        // Verify escaped versions ARE present for user info
        $this->assertStringContainsString('&lt;b&gt;John&lt;/b&gt;', $emailView);
        $this->assertStringContainsString('Doe&lt;script&gt;alert(1)&lt;/script&gt;', $emailView);

        // The form data response is also escaped (most important: raw script is NOT present above)
    }

    /**
     * Test that HTML/JavaScript in user confirmation email is escaped
     */
    public function test_user_email_escapes_user_input_with_html(): void
    {
        Mail::fake();

        session(['renovation.intent' => 'quote']);

        // Complete form with malicious input
        $this->post('/renovate/partial-renovation/1', ['response' => 'bathroom']);
        $this->post('/renovate/partial-renovation/2', ['response' => 'under-10k']);
        $this->post('/renovate/partial-renovation/3', [
            'response' => '<img src=x onerror=alert(1)>',
        ]);

        // Submit with user info
        $response = $this->post('/renovate/partial-renovation/submit', [
            'first_name' => 'John<script>',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
        ]);

        $response->assertRedirect('/renovate/success');

        // Get the submission
        $submission = RenovationSubmission::latest()->first();

        // Render the user email view
        $emailView = view('emails.renovation-user', [
            'submission' => $submission,
            'intent' => \App\Enums\RenovationIntent::from($submission->intent),
            'category' => \App\Enums\RenovationCategory::from($submission->category_slug),
        ])->render();

        // Verify raw HTML/JavaScript is NOT in the rendered email
        $this->assertStringNotContainsString('<img src=x onerror=alert(1)>', $emailView);
        $this->assertStringNotContainsString('John<script>', $emailView);

        // Verify escaped versions ARE present (or at least the dangerous parts are not executable)
        // Note: The user email may not show all form details, so we just verify no XSS
        $this->assertStringContainsString('John&lt;script&gt;', $emailView);
    }

    /**
     * Test that checkbox array responses with HTML are escaped
     */
    public function test_checkbox_responses_with_html_are_escaped(): void
    {
        $maliciousResponse = '<script>alert("XSS")</script>';

        $submission = RenovationSubmission::create([
            'intent' => 'quote',
            'category_slug' => 'complete-renovation',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'form_data_json' => [
                1 => 'under-50k',
                2 => 'under-50',
                3 => ['bathroom', 'kitchen', $maliciousResponse],
            ],
            'status' => 'pending',
        ]);

        $response = $this->actingAs($this->adminUser)
            ->get(route('admin.renovation-submissions.show', $submission));

        $response->assertStatus(200);

        // Verify raw script is NOT present
        $response->assertDontSee('<script>alert("XSS")</script>', false);

        // Verify escaped version IS present
        $response->assertSee('&lt;script&gt;alert(&quot;XSS&quot;)&lt;/script&gt;', false);
    }

    /**
     * Test that admin index view escapes user input
     */
    public function test_admin_index_view_escapes_user_input(): void
    {
        $submission = RenovationSubmission::create([
            'intent' => 'quote',
            'category_slug' => 'partial-renovation',
            'first_name' => '<script>alert("XSS")</script>',
            'last_name' => '<b>Doe</b>',
            'email' => 'test@example.com<img src=x>',
            'form_data_json' => [],
            'status' => 'pending',
        ]);

        $response = $this->actingAs($this->adminUser)
            ->get(route('admin.renovation-submissions.index'));

        $response->assertStatus(200);

        // Verify raw HTML/JavaScript is NOT present
        $response->assertDontSee('<script>alert("XSS")</script>', false);
        $response->assertDontSee('<b>Doe</b>', false);
        $response->assertDontSee('<img src=x>', false);

        // Verify escaped versions ARE present
        $response->assertSee('&lt;script&gt;alert(&quot;XSS&quot;)&lt;/script&gt;', false);
        $response->assertSee('&lt;b&gt;Doe&lt;/b&gt;', false);
    }

    /**
     * Test that event attributes in user input are escaped
     */
    public function test_event_attributes_are_escaped(): void
    {
        $maliciousInput = '<div onclick="alert(1)" onload="alert(2)">Click me</div>';

        $submission = RenovationSubmission::create([
            'intent' => 'quote',
            'category_slug' => 'partial-renovation',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'form_data_json' => [
                1 => 'bathroom',
                2 => 'under-10k',
                3 => $maliciousInput,
            ],
            'status' => 'pending',
        ]);

        $response = $this->actingAs($this->adminUser)
            ->get(route('admin.renovation-submissions.show', $submission));

        $response->assertStatus(200);

        // Verify raw event handlers are NOT present
        $response->assertDontSee('onclick="alert(1)"', false);
        $response->assertDontSee('onload="alert(2)"', false);

        // Verify escaped version IS present
        $response->assertSee('&lt;div onclick=&quot;alert(1)&quot; onload=&quot;alert(2)&quot;&gt;Click me&lt;/div&gt;', false);
    }

    /**
     * Test that SQL injection attempts in text fields are safely stored and displayed
     */
    public function test_sql_injection_attempts_are_safely_handled(): void
    {
        $sqlInjection = "'; DROP TABLE users; --";

        $submission = RenovationSubmission::create([
            'intent' => 'quote',
            'category_slug' => 'partial-renovation',
            'first_name' => 'John',
            'last_name' => $sqlInjection,
            'email' => 'john@example.com',
            'form_data_json' => [
                1 => 'bathroom',
                2 => 'under-10k',
                3 => $sqlInjection,
            ],
            'status' => 'pending',
        ]);

        // Verify the submission was created (SQL injection didn't execute)
        $this->assertDatabaseHas('renovation_submissions', [
            'id' => $submission->id,
            'last_name' => $sqlInjection,
        ]);

        // Verify it displays safely in admin view
        $response = $this->actingAs($this->adminUser)
            ->get(route('admin.renovation-submissions.show', $submission));
        $response->assertStatus(200);
        $response->assertSee($sqlInjection);
    }

    /**
     * Test that unicode and special characters are handled correctly
     */
    public function test_unicode_and_special_characters_are_handled(): void
    {
        $unicodeInput = '测试 <script>alert("XSS")</script> émojis 🎉';

        $submission = RenovationSubmission::create([
            'intent' => 'quote',
            'category_slug' => 'partial-renovation',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'form_data_json' => [
                1 => 'bathroom',
                2 => 'under-10k',
                3 => $unicodeInput,
            ],
            'status' => 'pending',
        ]);

        $response = $this->actingAs($this->adminUser)
            ->get(route('admin.renovation-submissions.show', $submission));

        $response->assertStatus(200);

        // Verify unicode characters are preserved
        $response->assertSee('测试');
        $response->assertSee('émojis');
        $response->assertSee('🎉');

        // Verify script tags are still escaped
        $response->assertDontSee('<script>alert("XSS")</script>', false);
        $response->assertSee('&lt;script&gt;alert(&quot;XSS&quot;)&lt;/script&gt;', false);
    }
}
