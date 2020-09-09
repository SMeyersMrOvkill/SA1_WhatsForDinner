<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{

    public static function findByRawHandle(string $handle) 
    {
        return Account::where('handle', '->'.$handle)->first();
    }

    public static function findByUser(User $user)
    {
        return Account::where('uid', $user->id);
    }
    
}
