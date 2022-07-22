<?php

namespace Modules\ProductModule\Repository;

use Illuminate\Support\Facades\DB;
use Modules\ProductModule\Entities\Product;
use Prettus\Repository\Eloquent\BaseRepository;

class ProductRepository extends BaseRepository
{

    public function model()
    {
        return Product::class;
    }


    public function findAllWithTrashed()
    {
        return Product::withTrashed()->get();
    }

    function getField($id, $field)
    {
        $provider =  Product::where('id', $id)->first();
        return $provider[$field];
    }

    public function edit($request, $product)
    {
        // ddd($product);
        $Product = Product::where('id', $product)->first();

        // dd($product->update($request->validated()));
        return $Product->update($request->validated());
    }

    public function decrease($product_id, $new_quantity){
        // return Product::update();
        $res = DB::raw('UPDATE productsss set availabe_items = (availabe_items - '.$new_quantity . ') where id='. $product_id);
    }
  
}
