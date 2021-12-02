<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    //ini untuk default value
    protected $attributes = [
    ];

    protected $table = 'users';

    public function roles()
    {
        return $this
            ->belongsToMany('App\Roles', 'users_roles', 'users_id')
            ->withTimestamps();
    }

    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRoles($roles)) {
            return true;
        }
        abort(401, 'This action is unauthorized.');
    }

    public static function hasAnyRoles($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRoles($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRoles($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRoles($roles)
    {
        if ($this->roles()->where('name', $roles)->first()) {
            return true;
        }
        return false;
    }
}
