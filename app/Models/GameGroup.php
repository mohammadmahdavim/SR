<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameGroup extends Model
{
    use HasFactory;
    use SoftDeletes;
protected $guarded=[];
    public function getIdAttribute($value)
    {
        return openssl_encrypt($value, config('encrypt_key.ciphering'),
            config('encrypt_key.encryption_key'), config('encrypt_key.options'), config('encrypt_key.encryption_iv'));
    }
    public function region()
    {
        return $this->belongsTo(Region::class)->withDefault();
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class)->withDefault();
    }
}
