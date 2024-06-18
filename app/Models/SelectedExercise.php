<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SelectedExercise extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'select_exercises';

    protected $primaryKey = 'selectedexercise_id';

    protected $fillable = [
        'class_schedule_id',
        'exercise_id',
        'user_id',
    ];
}
