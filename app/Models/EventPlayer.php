<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventPlayer extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function getIdAttribute($value)
    {
        return openssl_encrypt($value, config('encrypt_key.ciphering'),
            config('encrypt_key.encryption_key'), config('encrypt_key.options'), config('encrypt_key.encryption_iv'));
    }
    public function event()
    {

        return $this->belongsTo(Event::class)->withDefault();
    }

    public function member()
    {

        return $this->belongsTo(TeamProfileMember::class)->withDefault();
    }

    public function position()
    {

        return $this->belongsTo(Position::class)->withDefault();
    }

    public function polar()
    {

        return $this->belongsTo(ContractProductDetail::class,'polar_sensor_id','id')->withDefault();
    }

    public function sensor()
    {

        return $this->belongsTo(ContractProductDetail::class,'footbar_sensor_id','id')->withDefault();
    }
}
