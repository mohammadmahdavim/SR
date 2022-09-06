<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HighlightDetailSubTag extends Model
{
    use HasFactory;
    use SoftDeletes;
protected $guarded=[];
    public function getIdAttribute($value)
    {
        return encrypt($value);
    }
    public function sub_tag()
    {
        return $this->belongsTo(SubTag::class)->withDefault();
    }

    public function highlight_detail()
    {
        return $this->belongsTo(HighlightDetail::class)->withDefault();
    }
}
