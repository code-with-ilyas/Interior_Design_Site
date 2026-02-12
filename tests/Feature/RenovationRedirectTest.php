<?php

namespace Tests\Feature;

use Tests\TestCase;

class RenovationRedirectTest extends TestCase
{
    /**
     * Test that old renovation URLs redirect to new format
     */
    public function test_renovation_step_redirects_to_complete_renovation(): void
    {
        $response = $this->get('/renovation/step1');
        $response->assertRedirect('/renovate/complete-renovation/1');
        $response->assertStatus(301);
    }

    /**
     * Test that old estimate URLs redirect to new format
     */
    public function test_estimate_step_redirects_to_partial_renovation(): void
    {
        $response = $this->get('/estimate/step1');
        $response->assertRedirect('/renovate/partial-renovation/1');
        $response->assertStatus(301);
    }

    /**
     * Test that old energy-renovation URLs redirect to new format
     */
    public function test_energy_renovation_step_redirects(): void
    {
        $response = $this->get('/energy-renovation/step1');
        $response->assertRedirect('/renovate/energy-renovation/1');
        $response->assertStatus(301);
    }

    /**
     * Test that old specific-works URLs redirect to new format
     */
    public function test_specific_works_step_redirects_to_small_specific_works(): void
    {
        $response = $this->get('/specific-works/step1');
        $response->assertRedirect('/renovate/small-specific-works/1');
        $response->assertStatus(301);
    }

    /**
     * Test that old elevations URLs redirect to new format
     */
    public function test_elevations_step_redirects_to_home_elevation(): void
    {
        $response = $this->get('/elevations/step1');
        $response->assertRedirect('/renovate/home-elevation/1');
        $response->assertStatus(301);
    }

    /**
     * Test that old extensions URLs redirect to new format
     */
    public function test_extensions_step_redirects_to_home_extension(): void
    {
        $response = $this->get('/extensions/step1');
        $response->assertRedirect('/renovate/home-extension/1');
        $response->assertStatus(301);
    }
}
