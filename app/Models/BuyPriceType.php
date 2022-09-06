<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyPriceType extends Model
{
    use HasFactory;
    public function getIdAttribute($value)
    {
        return encrypt($value);
    }
}
