<?php

namespace Modules\ProductModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
   

    protected $hidden = ['created_at'];
    protected $fillable = ['id', 'product_id', 'quantity'];
    
    public function stocks()
    {
        return $this->hasMany(Product::class, 'id');
    }
}
