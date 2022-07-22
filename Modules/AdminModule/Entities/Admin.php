<?php

namespace Modules\AdminModule\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use SoftDeletes;
    protected $table = "admins";
    protected $guard = 'admin';
    protected $guarded = [];
    public $timestamps = true;

    protected $hidden = [
       'created_at','updated_at','deleted_at'
    ];
    public function orders()
    {
        return $this->hasMany(Order::class, 'created_by_id');
    }
}

