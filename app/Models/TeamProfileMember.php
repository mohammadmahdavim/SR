<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamProfileMember extends Model
{
    use HasFactory;
    use SoftDeletes;

   public function team()
    {
        return $this->belongsTo(TeamProfile::class)->withDefault();
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function user_type()
    {
        return $this->belongsTo(UserType::class)->withDefault();
    }

    public function position()
    {
        return $this->belongsTo(Position::class)->withDefault();
    }
}
