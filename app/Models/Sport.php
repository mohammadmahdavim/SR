<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sport extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function age_group()
    {
        return $this->belongsTo(AgeGroup::class)->withDefault();
    }

}
