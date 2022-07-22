<?php

namespace Modules\CustomerModule\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\OrderModule\Entities\Order;

class Customer extends Authenticatable
{
    use SoftDeletes;
    protected $table = "customers";
    protected $guard = 'customer';
    protected $guarded = [];
    public $timestamps = true;

    protected $hidden = [
       'created_at','updated_at','deleted_at'
    ];
    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
}

