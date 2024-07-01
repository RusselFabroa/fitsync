<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyClassSchedule extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "daily_class_schedules";

    protected $primaryKey = 'class_id';

    protected $fillable = [
        'user_id',
        'class_title',
        'class_subtitle',
        'class_description',
        'class_trainor',
        'class_date',
        'class_start_time',
        'class_end_time',
        'class_limit',
        'class_attendees',
        'class_type'
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
