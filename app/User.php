<?php

namespace App;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements CanResetPassword
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * User with role relation (1 to 1)
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * User with student relation (1 to 1)
     */
    public function student()
    {
        return $this->hasOne(Student::class);
    }

    /**
     * User with teacher relation (1 to 1)
     */
    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }
}
