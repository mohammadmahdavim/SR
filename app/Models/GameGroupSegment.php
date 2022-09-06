<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameGroupSegment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[];
    public function getIdAttribute($value)
    {
        return encrypt($value);
    }
    public function season()
    {
        return $this->belongsTo(GameGroupSeason::class)->withDefault();
    }
}
