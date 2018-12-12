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

    public function news()
    {
      return $this->hasMany('App\News', 'user_id');
    }

    public function roles()
    {
      return $this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');

    }
    public function permissions()
    {
      $array = [];
      foreach ($this->roles as $role) {
        foreach ($role->permissions as $permission) {
          $array[$permission->name] = $permission;
        }
      }
      return $array;
    }
    public function hasRole($name)
    {
      foreach ($this->roles as $role) {
        if ($name == $role->name) {
          return true;
        }
      }
    }
    public function hasPermission($name)
    {
      foreach ($this->roles as $role) {
          if ($role->hasPermission($name)){
            return true;
          }
      }
    }
    public function time($huh)
    {
      return date($huh, strtotime($this->created_at));
    }
}
