<?php

namespace Tests\Feature;

use App\Models\RenovationSubmission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class RenovationFlowTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test complete renovation flow from intent to submission
     */
    public function test_complete_renovation_flow(): void
    {
        Mail::fake();

        // Step 1: Visit intent selection page
        $response = $this->get('/renovate');
        $response->assertStatus(200);
        $response->assertSee('I need a quote');
        $response->assertSee('I would like an estimate');

        // Step 2: Select intent
        $response = $this->post('/renovate/intent', [
            'intent' => 'quote',
        ]);
        $response->assertRedirect('/renovate/select-category');
        $this->assertEquals('quote', session('renovation.intent'));

        // Step 3: View category selection
        $response = $this->get('/renovate/select-category');
        $response->assertStatus(200);
        $response->assertSee('Partial Renovation');
        $response->assertSee('Complete Renovation');

        // Step 4: Select category (Partial Renovation - 3 steps)
        $response = $this->get('/renovate/partial-renovation');
        $response->assertStatus(200);
        $response->assertSee('Room Selection');
        $response->assertSee('Step 1 of 3');

        // Step 5: Submit first step
        $response = $this->post('/renovate/partial-renovation/1', [
            'response' => 'bathroom',
        ]);
        $response->assertRedirect('/renovate/partial-renovation/2');

        // Step 6: Submit second step
        $response = $this->post('/renovate/partial-renovation/2', [
            'response' => 'under-10k',
        ]);
        $response->assertRedirect('/renovate/partial-renovation/3');

        // Step 7: Submit third step
        $response = $this->post('/renovate/partial-renovation/3', [
            'response' => 'I need bathroom renovation',
        ]);
        $response->assertRedirect('/renovate/partial-renovation/user-info');

        // Step 8: View user info form
        $response = $this->get('/renovate/partial-renovation/user-info');
        $response->assertStatus(200);
        $response->assertSee('first_name');
        $response->assertSee('email');

        // Step 9: Submit user info and complete submission
        $response = $this->post('/renovate/partial-renovation/submit', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'address' => '123 Main St',
            'city' => 'Paris',
            'postal_code' => '75001',
        ]);
        $response->assertRedirect('/renovate/success');

        // Step 10: Verify submission was created
        $this->assertDatabaseHas('renovation_submissions', [
            'intent' => 'quote',
            'category_slug' => 'partial-renovation',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'status' => 'pending',
        ]);

        // Step 11: View success page
        $response = $this->get('/renovate/success');
        $response->assertStatus(200);
    }

    /**
     * Test that intent selection is required before category selection
     */
    public function test_category_selection_requires_intent(): void
    {
        $response = $this->get('/renovate/select-category');
        $response->assertRedirect('/renovate');
    }

    /**
     * Test that intent is required before viewing steps
     */
    public function test_steps_require_intent(): void
    {
        $response = $this->get('/renovate/partial-renovation/1');
        $response->assertRedirect('/renovate');
    }

    /**
     * Test multi-step navigation with previous button
     */
    public function test_previous_step_navigation(): void
    {
        // Set up session
        session(['renovation.intent' => 'quote']);

        // Go to step 1 and submit
        $this->post('/renovate/partial-renovation/1', [
            'response' => 'bathroom',
        ]);

        // Go to step 2
        $response = $this->get('/renovate/partial-renovation/2');
        $response->assertStatus(200);

        // Navigate back to step 1
        $response = $this->get('/renovate/partial-renovation/previous/2');
        $response->assertRedirect('/renovate/partial-renovation/1');
    }

    /**
     * Test that form values are retained when navigating back
     */
    public function test_form_values_are_retained(): void
    {
        session(['renovation.intent' => 'quote']);

        // Submit step 1
        $this->post('/renovate/partial-renovation/1', [
            'response' => 'bathroom',
        ]);

        // Go back to step 1
        $response = $this->get('/renovate/partial-renovation/1');
        $response->assertStatus(200);

        // The view should have access to previousResponse
        $response->assertViewHas('previousResponse', 'bathroom');
    }

    /**
     * Test validation errors are displayed
     */
    public function test_validation_errors_display(): void
    {
        session(['renovation.intent' => 'quote']);

        // Try to submit step without required field
        $response = $this->post('/renovate/partial-renovation/1', [
            'response' => '',
        ]);

        $response->assertSessionHasErrors('response');
    }

    /**
     * Test invalid step number returns 404
     */
    public function test_invalid_step_number_returns_404(): void
    {
        session(['renovation.intent' => 'quote']);

        $response = $this->get('/renovate/partial-renovation/999');
        $response->assertStatus(404);
    }

    /**
     * Test invalid category slug returns 404
     */
    public function test_invalid_category_returns_404(): void
    {
        session(['renovation.intent' => 'quote']);

        $response = $this->get('/renovate/invalid-category/1');
        $response->assertStatus(404);
    }

    /**
     * Test user info form requires all steps completed
     */
    public function test_user_info_requires_all_steps_completed(): void
    {
        session(['renovation.intent' => 'quote']);

        // Try to access user info without completing steps
        $response = $this->get('/renovate/partial-renovation/user-info');
        $response->assertRedirect('/renovate/partial-renovation/1');
    }

    /**
     * Test checkbox input type (multiple selections)
     */
    public function test_checkbox_input_multiple_selections(): void
    {
        session(['renovation.intent' => 'quote']);

        // Complete Renovation has checkbox on step 3
        $this->post('/renovate/complete-renovation/1', [
            'response' => 'under-50k',
        ]);

        $this->post('/renovate/complete-renovation/2', [
            'response' => 'under-50',
        ]);

        // Submit multiple checkbox values
        $response = $this->post('/renovate/complete-renovation/3', [
            'response' => ['bathroom', 'kitchen', 'living-room'],
        ]);

        $response->assertRedirect('/renovate/complete-renovation/4');
    }

    /**
     * Test session is cleared after successful submission
     */
    public function test_session_cleared_after_submission(): void
    {
        Mail::fake();

        session(['renovation.intent' => 'quote']);

        // Complete all steps
        $this->post('/renovate/partial-renovation/1', ['response' => 'bathroom']);
        $this->post('/renovate/partial-renovation/2', ['response' => 'under-10k']);
        $this->post('/renovate/partial-renovation/3', ['response' => 'Details']);

        // Submit user info and follow redirect
        $response = $this->post('/renovate/partial-renovation/submit', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
        ]);

        $response->assertRedirect('/renovate/success');

        // Follow the redirect to get the new session state
        $response = $this->get('/renovate/success');

        // Now check that trying to access a step redirects (because session is cleared)
        $response = $this->get('/renovate/partial-renovation/1');
        $response->assertRedirect('/renovate');
    }
}
