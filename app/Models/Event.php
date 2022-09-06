<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];
    public function getIdAttribute($value)
    {
        return encrypt($value);
    }
    public function type()
    {
        return $this->belongsTo(EventType::class)->withDefault();
    }

    public function segment()
    {
        return $this->belongsTo(GameGroupSegment::class)->withDefault();
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class)->withDefault();
    }

    public function home_team()
    {
        return $this->belongsTo(TeamProfile::class,'home_team_profile_id','id')->withDefault();
    }

    public function away_team()
    {
        return $this->belongsTo(TeamProfile::class,'away_team_profile_id','id')->withDefault();
    }

    public function location()
    {
        return $this->belongsTo(GameLocation::class)->withDefault();
    }

    public function level()
    {
        return $this->belongsTo(Level::class)->withDefault();
    }

    public function sections()
    {
        return $this->hasMany(EventSection::class);
    }
}
