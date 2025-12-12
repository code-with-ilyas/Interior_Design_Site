<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_date_preference' => 'date',
        'attachments' => 'array',
        'gdpr_consent' => 'boolean',
        'marketing_consent' => 'boolean',
    ];

    /**
     * The attributes that should have default values.
     *
     * @var array
     */
    protected $attributes = [
        'status' => 'pending',
    ];

    /**
     * Get the pending quotes.
     */
    public static function pending()
    {
        return self::where('status', 'pending');
    }

    /**
     * Get the approved quotes.
     */
    public static function approved()
    {
        return self::where('status', 'approved');
    }

    /**
     * Get the rejected quotes.
     */
    public static function rejected()
    {
        return self::where('status', 'rejected');
    }

    /**
     * Scope a query to only include pending quotes.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope a query to only include approved quotes.
     */
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    /**
     * Scope a query to only include rejected quotes.
     */
    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }

    /**
     * Check if the quote is pending.
     */
    public function isPending()
    {
        return $this->status === 'pending';
    }

    /**
     * Check if the quote is approved.
     */
    public function isApproved()
    {
        return $this->status === 'approved';
    }

    /**
     * Check if the quote is rejected.
     */
    public function isRejected()
    {
        return $this->status === 'rejected';
    }

    /**
     * Approve the quote.
     */
    public function approve()
    {
        $this->status = 'approved';
        $this->save();
    }

    /**
     * Reject the quote.
     */
    public function reject()
    {
        $this->status = 'rejected';
        $this->save();
    }
}
