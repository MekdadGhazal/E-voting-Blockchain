<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'username',
        'password',
        'role',
        'priv_key',
        'bitcoin_address',
        'network'
    ];

    public function setUsername($username)
    {
        $this->update([
            'username' => $username
        ]);
    }

    public function getBitcoinAddress()
    {
        return $this->bitcoin_address;
    }

    public function setBitcoinAddress($bitcoin_address)
    {
        $this->update([
            'bitcoin_address' => $bitcoin_address
        ]);
    }

    public function setPrivKey($key)
    {
        $this->update([
            'priv_key' => $key
        ]);
    }

    public function setPassword($password)
    {
        $this->update([
            'password' => Hash::make($password)
        ]);
    }

//    public function setNetwork($network)
//    {
//        $this->update([
//            'network' => $network,
//        ]);
//    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
