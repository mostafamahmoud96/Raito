<?php

namespace Modules\OrderModule\Repository;

use Modules\OrderModule\Entities\OrderProduct;
use Prettus\Repository\Eloquent\BaseRepository;

class OrderProductRepository extends BaseRepository
{
    function model()
    {
        return OrderProduct::class;
    }

    function calculateProductRating($product_id){
        return OrderProduct::selectRaw('(sum(rate)/count(*)) as overall_rating')->where('product_id',$product_id)->where('rate','<>',0)->first();
    }

    function getProductOrdersByProductID($product_id){
        return OrderProduct::select('order_products.*')->join('orders','order_products.order_id','=','orders.id')->where('order_products.product_id',$product_id)->where('orders.status_id',1)->get();
    }
    function getOrdersByProductID($product_id){
        return OrderProduct::select('orders.*')->join('orders','order_products.order_id','=','orders.id')->where('order_products.product_id',$product_id)->where('orders.status_id',1)->get()->toArray();
    }
    function getOrderProductItems($order_id){

        return OrderProduct::where('order_id','=',$order_id->order_id)->get();
    }
     
    
    }
