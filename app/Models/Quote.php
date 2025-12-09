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


    protected $fillable = [
        'status',
        'name',
        'first_name',
        'email',
        'phone',
        'mesage',
        'company',
        'address',
        'postal_code',
        'city',
        'country',
        'cities',
    ];


    public static function pending()
    {
        return self::where('status', 'pending');
    }


    public static function approved()
    {
        return self::where('status', 'approved');
    }


    public static function rejected()
    {
        return self::where('status', 'rejected');
    }


    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }


    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }


    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }


    public function isPending()
    {
        return $this->status === 'pending';
    }


    public function isApproved()
    {
        return $this->status === 'approved';
    }


    public function isRejected()
    {
        return $this->status === 'rejected';
    }


    public function approve()
    {
        $this->status = 'approved';
        $this->save();
    }


    public function reject()
    {
        $this->status = 'rejected';
        $this->save();
    }
}
