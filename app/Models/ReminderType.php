<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReminderType extends Model
{
    use HasFactory;

    protected $table = 'reminder_types';

    protected $primaryKey = 'reminder_id';

    protected $fillable = [
        'reminder_name',
        'default_message'
    ];
}
