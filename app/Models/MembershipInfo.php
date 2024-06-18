<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MembershipInfo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'membership_info';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'membership_title',
        'membership_fee',
        'status'
    ];
}
