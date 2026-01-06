<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'show_id',
        'name',
        'email',
        'phone',
        'nationality',
        'num_tickets',
        'total_price',
        'status',
        'booking_code',
        'notes'
    ];

    // Opsional: Agar total_price selalu terbaca sebagai integer/float
    protected $casts = [
        'total_price' => 'integer',
        'num_tickets' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($booking) {
            // Cek jika booking_code belum diisi manual
            if (!$booking->booking_code) {
                $booking->booking_code = 'SAU-' . strtoupper(Str::random(8));
            }
        });
    }

    public function show()
    {
        return $this->belongsTo(Show::class);
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }
}
