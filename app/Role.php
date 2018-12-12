<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function user()
    {
      return $this->belongsToMany('App\User', 'user_roles', 'role_id', 'user_id');
    }

    public function permissions()
    {
      return $this->belongsToMany('App\Permission', 'role_permissions', 'role_id', 'permission_id');
    }
    public function hasPermission($name)
    {
      // foreach ($this->permission as $permission) {
      //   if ($name == $permission->name) {
      //     return true;
      //   }
      // }
      return in_array($name, $this->permissions()->pluck("name")->toArray());

    }
}
