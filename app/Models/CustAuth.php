<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Exception;

class CustAuth extends Model
{

    public static function register($username, $password) {
        if (User::where('username', $username)->exists()) {
            throw new Exception('Username sudah digunakan');
        }
        $hashedPassword = Hash::make($password);
        return User::create([
            'username' => $username,
            'password' => $hashedPassword
        ]);
        
    }
}
