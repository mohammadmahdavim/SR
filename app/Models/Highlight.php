<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Highlight extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function section()
    {
        return $this->belongsTo(EventSection::class)->withDefault();
    }
}
