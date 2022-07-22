<?php

namespace Modules\AdminModule\Repository;

use Modules\AdminModule\Entities\Admin;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\Permission\Models\Permission;

class AdminRepository extends BaseRepository
{
    public function model()
    {
        return Admin::class;
    }

    public function findAll()
    {
        return Admin::where('id', '!=', 1)->get();
    }

    public function getByIds($ids)
    {
        return Admin::whereIN('id', $ids)->get();
    }

    public function getField($id, $field)
    {
        $admin = Admin::where('id', $id)->first();
        return $admin[$field];
    }
    public function findWith($array_with)
    {
        return Admin::where('id', '!=', 1)->with($array_with)->get();
    }

   

}
