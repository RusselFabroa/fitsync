<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingSchedule extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'training_schedule';

    protected $primaryKey = 'training_id';

    protected $fillable = [
        'user_id',
        'training_title',
        'training_description',
        'training_date',
        'training_time',
    ];
}