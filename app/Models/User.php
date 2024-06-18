<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'contact_number',
        'email',
        'age',
        'address',
        'occupation',
        'gender',
        'role',
        'membership',
        'active_date',
        'availability',
        'password',
        'image',
        'status',
        'payment_date',
        'payment_due',
        'dob',
        'is_disabled',
        'specify',
        'emergency_name',
        'emergency_contact',
        'emergency_relationship',
        'profession'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function hasRole($role)
    {
        $roles = explode(',', $this->role); // assuming roles are stored as a comma-separated string

        return in_array($role, $roles);
    }
}
