<?php

namespace App\Models;

use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Laravel\Passport\PersonalAccessTokenFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;


    public function createToken($name, array $scopes = [])
    {
        $key = openssl_decrypt($this->getKey(), config('encrypt_key.ciphering'),
            config('encrypt_key.encryption_key'), config('encrypt_key.options'), config('encrypt_key.encryption_iv'));
        return Container::getInstance()->make(PersonalAccessTokenFactory::class)->make(
            $key, $name, $scopes
        );
    }

    public function getIdAttribute($value)
    {
        return openssl_encrypt($value, config('encrypt_key.ciphering'),
            config('encrypt_key.encryption_key'), config('encrypt_key.options'), config('encrypt_key.encryption_iv'));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

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
    ];

    public function country()
    {
        return $this->belongsTo(Region::class)->withDefault();
    }

    public function getRoles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'id');
    }

    public function findForPassport($username)
    {
        return $this->where('user_name', $username)->first();
//        return $this->where(fn($q) => $q->where('email', $username)->orWhere('phone_number', $username)->orwhere('user_name', $username));
    }

    public function id()
    {
        return encrypt($this->id);
    }

    public function setIdUserAttribute($value)
    {
        $this->attributes['id_product'] = decrypt($value);
    }
}
