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
        return encrypt($value);
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
