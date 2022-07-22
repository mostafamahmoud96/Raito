<?php

namespace Modules\ProductModule\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Modules\ProductModule\Repository\ProductRepository;
use Modules\ProductModule\Repository\StockRepository;
use Prettus\Repository\Eloquent\BaseRepository;

class ProductService
{
    // use UploaderHelper;

    private $productRepository;

    public function __construct(ProductRepository $productRepository, StockRepository $stockRepository)
    {
        $this->productRepository = $productRepository;
        $this->stockRepository = $stockRepository;

    }
    public function findAllWithTrashed()
    {
        return $this->productRepository->findAllWithTrashed();
    }



    public function findWithFilter($request)
    {
        return $this->productRepository->filterAllProviders($request);
    }

    public function findWhere($request)
    {
        return $this->productRepository->findWhere($request);
    }



    public function create($data)
    {

        $product_data = $this->validationUpdateOrRegister($data);

        return $this->productRepository->create($product_data);
    }

    public function update($request, $product)
    {
        return $this->productRepository->edit($request, $product);
    }


    public function findOne($id)
    {
        return $this->productRepository->find($id);
    }

    public function findAll()
    {
        return $this->productRepository->all();
    }

    public function deleteOne($id)
    {
        $product = $this->productRepository->findWhere(['id' => $id])->first();
        if ($product) {

            $product->delete();
            return true;
        }

        return false;
    }

  

    private function validationUpdateOrRegister($data)
    {
        $product_data = [];
        if (key_exists('name', $data) && $data['name'] != null) {
            $product_data['name'] = $data['name'];
        }

        if (key_exists('price', $data) && $data['price'] != null) {
            $product_data['price'] = $data['price'];
        }

        if (key_exists('barcode', $data) && $data['barcode'] != null) {
            $product_data['barcode'] = $data['barcode'];
        }

        if (key_exists('items_in_stock', $data) && $data['items_in_stock'] != null) {
            $product_data['items_in_stock'] = $data['items_in_stock'];
        }



        return $product_data;
    }

    public function updateActivation($id)
    {
        // dd($id);
        $product = $this->productRepository->find($id);
        // dd($product->is_available);
        if ($product->is_available == 0) {
            $is_available = 1;
        } else {
            $is_available = 0;
        }
        $active_data = [
            'is_available' => $is_available,
        ];
        // ddd($this->productRepository->update($active_data, $id));
        return $this->productRepository->update($active_data, $id);
    }

}
