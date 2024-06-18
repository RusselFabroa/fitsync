<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Forum extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'forums';

    protected $primaryKey = 'forum_id';

    protected $fillable = [
        'user_id',
        'forum_content',
        'role',
    ];
}
