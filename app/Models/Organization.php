<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function type()
    {
        return $this->belongsTo(OrganizationType::class)->withDefault();
    }

    public function storage()
    {
        return $this->belongsTo(StorageProvider::class)->withDefault();
    }

    public function region()
    {
        return $this->belongsTo(Region::class)->withDefault();
    }

    public function level()
    {
        return $this->belongsTo(Level::class)->withDefault();
    }
}
