<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HighlightDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
protected $guarded=[];
    public function getIdAttribute($value)
    {
        return encrypt($value);
    }
    public function highlight()
    {
        return $this->belongsTo(Highlight::class)->withDefault();
    }

    public function team_profile()
    {
        return $this->belongsTo(TeamProfile::class)->withDefault();
    }

    public function player()
    {
        return $this->belongsTo(EventPlayer::class,'event_player_id','id')->withDefault();
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class)->withDefault();
    }

    public function position()
    {
        return $this->belongsTo(Position::class)->withDefault();
    }
}
