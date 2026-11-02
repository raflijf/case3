<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use Exception;
use App\Exceptions\InvalidCredentialException;

#[Table('auth_session')]
#[Fillable(['user_id', 'key', 'expired_at'])]
class CustAuth extends Model
{

    protected function generateSessionKey() {
        return Str::random(64);
    }

    public function login($username, $password) {
        if (!User::where('username', $username)->exists()) {
            throw new InvalidCredentialException('Username atau Password salah ');
        }

        $user = User::where('username', $username)->first();
        if (!Hash::check($password, $user->password)) {
            throw new InvalidCredentialException('Username atau Password salah');
        }

        $sessionKey = $this->generateSessionKey();
        self::create([
            'user_id' => $user->id,
            'key' => $sessionKey,
            'expired_at' => now()->addDays(30)
        ]);
       
        Cookie::queue(
            'sessions_key',
            $sessionKey,
            60 * 24 * 30, // 30 hari
        );
        $this->isSuccess = true;
        return 'SUCCESS';
    }

    public static function register($username, $password) {
        if (User::where('username', $username)->exists()) {
            throw new InvalidCredentialException('Username sudah digunakan');
        }

        $hashedPassword = Hash::make($password);
        User::create([
            'username' => $username,
            'password' => $hashedPassword
        ]);
        return 'SUCCESS';
    }

    public static function logout() {
        $cookie = request()->cookie('sessions_key');
        $sessions = self::where('key', $cookie)->delete();;
        Cookie::queue(
            Cookie::forget('sessions_key')
        );
        return 'SUCCESS';
    }


}
