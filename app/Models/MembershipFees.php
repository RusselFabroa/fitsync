<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MembershipFees extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'membership_fees';

    protected $primaryKey = 'membership_id';

    protected $fillable = [
        'user_id',
        'membership_title',
        'membership_mop',
        'membership_payment_date',
        'membership_payment_status',
        'payment_receipt',
        'status'
    ];
}
