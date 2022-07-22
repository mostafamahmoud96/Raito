<?php

namespace Modules\ProductModule\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Modules\ProductModule\Repository\ProductRepository;
use Modules\ProductModule\Repository\StockRepository;
use Prettus\Repository\Eloquent\BaseRepository;

class StockService
{
    // use UploaderHelper;

    // private $productRepository;

    public function __construct(StockRepository $stockRepository, ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->stockRepository = $stockRepository;
    }


    public function addToStock($request)
    {   
        // dd($request);
        $new_quantity = $request->quantity;
        $product_id = $request->id;
        $old_quantity = $this->productRepository->findWhere(['id' => $product_id])->first();
        $in_stock = $new_quantity + $old_quantity->items_in_stock;
        $this->stockRepository->create($request->all());
        $this->productRepository->update(['items_in_stock' => $in_stock], $product_id);
        //   dd($in_stock);
        // dd($request->all());
    }

    public function restore($request)
    {
        // dd($request);

        foreach ($request as $one_product) {
            // dd($one_product);
            $new_quantity = $one_product->quantity;
            $product_id = $one_product->product_id;
            $old_quantity = $one_product->product->items_in_stock;
            // dd($old_quantity);
            $restore = $new_quantity + $old_quantity;
            // dd($restore);
            $this->productRepository->update(['items_in_stock' => $restore], $product_id);
        }
    }
}
