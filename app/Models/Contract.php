<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function organization()
    {
        return $this->belongsTo(Organization::class)->withDefault();
    }

    public function parent()
    {
        return $this->belongsTo(Contract::class)->withDefault();
    }

    public function getIdAttribute($value)
    {
        return encrypt($value);
    }
}
