<?php

namespace Modules\ProductModule\Repository;

use Modules\ProductModule\Entities\Stock;
use Prettus\Repository\Eloquent\BaseRepository;

class StockRepository extends BaseRepository
{

    public function model()
    {
        return Stock::class;
    }


  
}
