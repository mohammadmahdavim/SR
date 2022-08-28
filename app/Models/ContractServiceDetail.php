<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractServiceDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function service()
    {
        return $this->belongsTo(BaseService::class)->withDefault();
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class)->withDefault();
    }

    public function product_type()
    {
        return $this->belongsTo(ProductType::class)->withDefault();
    }
}
