<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationNumber extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function getIdAttribute($value)
    {
        return encrypt($value);
    }
}
