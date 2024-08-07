<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{
    use HasFactory;

    protected $table = 'sms';

    protected $primaryKey = 'sms_id';

    protected $fillable = [
        'user_id',
        'contact_number',
        'reminder_type',
    ];
}
