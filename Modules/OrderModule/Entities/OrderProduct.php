<?php

namespace Modules\OrderModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\OrderModule\Entities\Order;
use Modules\ProductModule\Entities\Product;

class OrderProduct extends Model
{
    protected $guarded = [];
    protected $fillable = ['order_id', 'product_id', 'product_name', 'item_price','quantity','total_price'];

    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
