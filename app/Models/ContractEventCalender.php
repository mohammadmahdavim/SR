<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractEventCalender extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function getIdAttribute($value)
    {
        return openssl_encrypt($value, config('encrypt_key.ciphering'),
            config('encrypt_key.encryption_key'), config('encrypt_key.options'), config('encrypt_key.encryption_iv'));
    }
    public function team_profile()
    {
        return $this->belongsTo(TeamProfile::class)->withDefault();
    }

    public function product_type()
    {
        return $this->belongsTo(ProductType::class)->withDefault();
    }

    public function service()
    {
        return $this->belongsTo(BaseService::class)->withDefault();
    }
}
