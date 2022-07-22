<?php

namespace Modules\ProductModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['id', 'name', 'price', 'barcode', 'items_in_stock','is_available'];
}
