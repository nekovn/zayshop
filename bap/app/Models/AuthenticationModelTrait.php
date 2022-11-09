<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;

trait AuthenticationModelTrait
{
    public function activeGuard()
    {
        foreach (array_keys(config('admin.guards')) as $guard) {
            if(auth()->guard($guard)->check()) {
                return $guard;
            }
        }
        return null;
    }

    public function setPasswordAttribute($password)
    {
        if($password) {
            $this->attributes['password'] = Hash::make($password);
        } else {
            unset($this->attributes['password']);
        }
    }



}
