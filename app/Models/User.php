<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static firstOrCreate(array $array, mixed $data)
 * @property mixed $gender
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory;
    //use Notifiable;

    // Force SQL table name
    protected $table = 'users';

    // Unlock for modification all SQL table fields
    protected $guarded = false;

    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    // The attributes that should be hidden for serialization
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // The attributes that should be cast
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function getGenderTitle($gender): string
    {
        $result = '';

        if (isset($gender)) {
            $genders = [
                self::GENDER_MALE   => 'Male',
                self::GENDER_FEMALE => 'Female',
            ];

            $result = $genders[$gender];
        }

        return $result;
    }
}
