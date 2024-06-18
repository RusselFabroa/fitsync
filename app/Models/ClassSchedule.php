<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassSchedule extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "class_schedules";

    protected $primaryKey = 'class_id';

    protected $fillable = [
        'user_id',
        'class_title',
        'class_description',
        'class_start_date',
        'class_end_date',
        'class_start_time',
        'class_end_time',
        'class_limit',
        'class_current',
        'class_type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
