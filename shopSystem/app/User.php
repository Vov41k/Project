<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'verified',
        'token',
        'password',
        'role',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    //checks if user role  are what you want
    public function hasRole($role)
    {
        return $this->role == $role;
    }
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

}
