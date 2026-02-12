<?php

namespace App\Services;

class RenovationFormService
{
    private const SESSION_PREFIX = 'renovation.responses.';

    /**
     * Store a step response in session
     */
    public function storeStepResponse(string $categorySlug, int $stepNumber, mixed $response): void
    {
        $key = $this->getSessionKey($categorySlug, $stepNumber);
        session([$key => $response]);
    }

    /**
     * Get a step response from session
     */
    public function getStepResponse(string $categorySlug, int $stepNumber): mixed
    {
        $key = $this->getSessionKey($categorySlug, $stepNumber);
        return session($key);
    }

    /**
     * Get all step responses for a category
     */
    public function getAllStepResponses(string $categorySlug): array
    {
        // Try to get from nested structure first
        $nestedResponses = session("renovation.responses.{$categorySlug}", []);

        if (!empty($nestedResponses) && is_array($nestedResponses)) {
            ksort($nestedResponses);
            return $nestedResponses;
        }

        // Fallback to flat key structure (for backward compatibility)
        $responses = [];
        $sessionData = session()->all();
        $prefix = self::SESSION_PREFIX . $categorySlug . '.';

        foreach ($sessionData as $key => $value) {
            if (str_starts_with($key, $prefix)) {
                $stepNumber = (int) str_replace($prefix, '', $key);
                $responses[$stepNumber] = $value;
            }
        }

        ksort($responses);
        return $responses;
    }

    /**
     * Check if all steps are completed
     */
    public function areAllStepsCompleted(string $categorySlug, int $totalSteps): bool
    {
        for ($i = 1; $i <= $totalSteps; $i++) {
            if (!$this->getStepResponse($categorySlug, $i)) {
                return false;
            }
        }
        return true;
    }

    /**
     * Clear all session data for a category
     */
    public function clearSessionData(string $categorySlug): void
    {
        $sessionData = session()->all();
        $prefix = self::SESSION_PREFIX . $categorySlug . '.';

        foreach ($sessionData as $key => $value) {
            if (str_starts_with($key, $prefix)) {
                session()->forget($key);
            }
        }

        session()->forget('renovation.intent');
        session()->forget('renovation.category');
    }

    /**
     * Get session key for a step
     */
    private function getSessionKey(string $categorySlug, int $stepNumber): string
    {
        return self::SESSION_PREFIX . $categorySlug . '.' . $stepNumber;
    }

    /**
     * Get validation rules for a step
     */
    public function getStepValidationRules(array $step): array
    {
        $rules = [];

        if ($step['required']) {
            $rules['response'] = ['required'];
        } else {
            $rules['response'] = ['nullable'];
        }

        // Add type-specific rules
        switch ($step['input_type']) {
            case 'text':
                $rules['response'][] = 'string';
                $rules['response'][] = 'max:255';
                break;
            case 'textarea':
                $rules['response'][] = 'string';
                $rules['response'][] = 'max:2000';
                break;
            case 'radio':
            case 'select':
                $rules['response'][] = 'string';
                $validValues = array_column($step['options'], 'value');
                $rules['response'][] = 'in:' . implode(',', $validValues);
                break;
            case 'checkbox':
                $rules['response'] = ['array'];
                if ($step['required']) {
                    $rules['response'][] = 'min:1';
                }
                $rules['response.*'] = ['string'];
                $validValues = array_column($step['options'], 'value');
                $rules['response.*'][] = 'in:' . implode(',', $validValues);
                break;
        }

        return $rules;
    }
}
