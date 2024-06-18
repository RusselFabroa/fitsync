<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingBookings extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'training_bookings';

    protected $primaryKey = 'tb_id';

    protected $fillable = [
        'user_id',
        'trainings_id',
        'booking_mop',
        'booking_payment',
        'booking_payment_date',
    ];
}