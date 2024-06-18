<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bmi extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bmis';

    protected $primaryKey = 'bmi_id';

    protected $fillable = [
        'user_id',
        'bmi_height',
        'bmi_weight',
        'bmi_result',
    ];
}