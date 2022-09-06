<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubTag extends Model
{
    use HasFactory;
    use SoftDeletes;
protected $guarded=[];
    public function getIdAttribute($value)
    {
        return encrypt($value);
    }
    public function tag()
    {
        return $this->belongsTo(Tag::class)->withDefault();
    }
}
