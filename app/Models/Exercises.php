<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exercises extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'exercises';

    protected $primaryKey = 'exercise_id';

    protected $fillable = [
        'exercise_name',
        'exercise_reps',
        'exercise_sets',
    ];
}
