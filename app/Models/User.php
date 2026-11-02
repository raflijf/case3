<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

use App\Models\CustAuth;
use App\Exceptions\InvalidCredentialException;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
#[Fillable(['username', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    public $isAuthenticated = false;


    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        $initials = Str::initials($this->name, true);

        return Str::length($initials) > 1
            ? Str::substr($initials, 0, 1).Str::substr($initials, -1)
            : $initials;
    }

    public static function profileUpdate($data = []) {
        self::where('id', me()->id)->update($data);
    }

    public static function me() {
        $cookie = request()->cookie('sessions_key');

        if (empty($cookie)) {
            return new self();
        }

        $user = CustAuth::query()
            ->join('users', 'auth_session.user_id', '=', 'users.id')
            ->where('auth_session.key', $cookie)
            ->where('auth_session.expired_at', '>', now())
            ->select('users.*')
            ->first();

        if ($user === null) {
            return new self();
        }

        $userModel = new self();
        $userModel->setRawAttributes((array) $user->getAttributes());

        $userModel->isAuthenticated = true;

        return $userModel;
    }

}
