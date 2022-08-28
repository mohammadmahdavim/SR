<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameGroupSeason extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function game_group()
    {
        return $this->belongsTo(GameGroup::class)->withDefault();
    }
}
