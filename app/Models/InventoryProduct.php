<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryProduct extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function product_type()
    {
        return $this->belongsTo(ProductType::class)->withDefault();
    }
}
