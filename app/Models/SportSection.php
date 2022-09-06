<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SportSection extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function getIdAttribute($value)
    {
        return encrypt($value);
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class)->withDefault();
    }

    public function section()
    {
        return $this->belongsTo(BaseSection::class)->withDefault();
    }
}
