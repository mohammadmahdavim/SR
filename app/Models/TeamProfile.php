<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamProfile extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[];

    public function getIdAttribute($value)
    {
        return encrypt($value);
    }
    public function sport()
    {
        return $this->belongsTo(Sport::class)->withDefault();
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class)->withDefault();
    }

    public function age_group()
    {
        return $this->belongsTo(AgeGroup::class)->withDefault();
    }

    public function level()
    {
        return $this->belongsTo(Level::class)->withDefault();
    }

    public function location()
    {
        return $this->belongsTo(GameLocation::class)->withDefault();
    }
}
