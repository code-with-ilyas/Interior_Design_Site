<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class RenovationSubmission extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'renovation_submissions';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'form_data_json' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope a query to only include submissions with a specific intent.
     */
    public function scopeByIntent(Builder $query, string $intent): Builder
    {
        return $query->where('intent', $intent);
    }

    /**
     * Scope a query to only include submissions with a specific category.
     */
    public function scopeByCategory(Builder $query, string $categorySlug): Builder
    {
        return $query->where('category_slug', $categorySlug);
    }

    /**
     * Scope a query to only include submissions with a specific status.
     */
    public function scopeByStatus(Builder $query, string $status): Builder
    {
        return $query->where('status', $status);
    }

    /**
     * Scope a query to filter by date range.
     */
    public function scopeDateRange(Builder $query, ?string $startDate, ?string $endDate): Builder
    {
        if ($startDate) {
            $query->whereDate('created_at', '>=', $startDate);
        }

        if ($endDate) {
            $query->whereDate('created_at', '<=', $endDate);
        }

        return $query;
    }

    /**
     * Scope a query to only include pending submissions.
     */
    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope a query to only include reviewed submissions.
     */
    public function scopeReviewed(Builder $query): Builder
    {
        return $query->where('status', 'reviewed');
    }

    /**
     * Scope a query to only include completed submissions.
     */
    public function scopeCompleted(Builder $query): Builder
    {
        return $query->where('status', 'completed');
    }

    /**
     * Get the full name of the submitter.
     */
    public function getFullNameAttribute(): string
    {
        return trim("{$this->first_name} {$this->last_name}");
    }

    /**
     * Check if the submission is pending.
     */
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    /**
     * Check if the submission is reviewed.
     */
    public function isReviewed(): bool
    {
        return $this->status === 'reviewed';
    }

    /**
     * Check if the submission is completed.
     */
    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }

    /**
     * Mark the submission as reviewed.
     */
    public function markAsReviewed(): bool
    {
        return $this->update(['status' => 'reviewed']);
    }

    /**
     * Mark the submission as completed.
     */
    public function markAsCompleted(): bool
    {
        return $this->update(['status' => 'completed']);
    }

    /**
     * Get the decoded form data.
     */
    public function getFormData(): array
    {
        $data = $this->form_data_json;

        // Handle cases where form_data_json might be a string (shouldn't happen with proper casting, but defensive)
        if (is_string($data)) {
            $decoded = json_decode($data, true);
            return is_array($decoded) ? $decoded : [];
        }

        return is_array($data) ? $data : [];
    }
}

