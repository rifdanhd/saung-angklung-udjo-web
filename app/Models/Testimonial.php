<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country',
        'message',
        'rating',
        'avatar',
        'is_approved'
    ];

    protected $casts = [
        'is_approved' => 'boolean',
    ];

    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    public function scopeRecent($query, $limit = 6)
    {
        return $query->latest()->limit($limit);
    }

    public function getStarsAttribute()
    {
        return str_repeat('⭐', $this->rating);
    }
}
