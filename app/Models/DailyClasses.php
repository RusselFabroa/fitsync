<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyClasses extends Model
{
    
    use HasFactory, SoftDeletes;

    protected $table = "daily_classes";

    protected $primaryKey = 'id';

    protected $fillable = [
        'class_id',
        'class_day',
        'class_start_time',
        'class_end_time',
        'current_attendees',
        'attendees_limit',
        'status'
        
    ];
}
