<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory;
    protected $guarded=[];

//    public function getIdAttribute($value)
//    {
//        return encrypt($value);
//    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function detail()
    {
        return $this->belongsToMany(PermissionRoleDetail::class,'permission_role_details');
    }
}
