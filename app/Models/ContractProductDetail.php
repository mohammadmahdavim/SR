<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractProductDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function getIdAttribute($value)
    {
        return openssl_encrypt($value, config('encrypt_key.ciphering'),
            config('encrypt_key.encryption_key'), config('encrypt_key.options'), config('encrypt_key.encryption_iv'));
    }
    public function inventory_log()
    {
        return $this->belongsTo(InventoryLog::class)->withDefault();
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class)->withDefault();
    }
}
