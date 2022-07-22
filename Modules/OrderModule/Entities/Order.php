<?php

namespace Modules\OrderModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\AdminModule\Entities\Admin;
use Modules\CustomerModule\Entities\Customer;
use Modules\OrderModule\Entities\OrderProduct;



class Order extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id');
    }

    public function getAttributeProductsCount()
    {
        return $this->products->count();
    }
}
