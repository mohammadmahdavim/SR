<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryLog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[];
    public function product_type()
    {
        return $this->belongsTo(ProductType::class)->withDefault();
    }
}
