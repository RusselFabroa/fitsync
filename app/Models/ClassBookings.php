<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassBookings extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'class_bookings';

    protected $primaryKey = 'cb_id';

    protected $fillable = [
        'user_id',
        'class_id',
        'booking_mop',
        'booking_payment',
        'booking_payment_date',
        'booking_payment_status',
        'is_reserved',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
