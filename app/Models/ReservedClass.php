<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReservedClass extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "reserved_classes";

    protected $primaryKey = 'id';

    protected $fillable = [
        'class_date',
        'class_day',
        'class_id',
        'user_id',
        'status'
       
        
    ];
}
