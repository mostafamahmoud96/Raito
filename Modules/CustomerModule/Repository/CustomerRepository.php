<?php

namespace Modules\CustomerModule\Repository;

use Modules\CustomerModule\Entities\Customer;
use Prettus\Repository\Eloquent\BaseRepository;

class CustomerRepository extends BaseRepository
{

    public function model()
    {
        return Customer::class;
    }

    public function updatePushToken($id, $push_token)
    {
        $customer = Customer::where('id', $id)->first();
        $customer->update(['push_token' => $push_token]);
    }

    public function getField($id, $field)
    {
        $customer = Customer::where('id', $id)->first();
        return $customer[$field];
    }
    public function getPass($id)
    {
        $pass = Customer::where('id', $id)->pluck('password')->first();
        return $pass;
    }
    public function logout($id)
    {
        $customer = Customer::where('id', $id)->first();
        $customer->update(['push_token' => null]);
    }

    public function findWithFilter($request)
    {
        $customers = Customer::where('created_at', '<>', null);
        if ($request->has('is_active') && $request->is_active != null) {
            $customers->where('is_active', $request->is_active);
        }
        // dd($customers);
               return $customers = $customers->get();
    }
    public function findCustomer($id)
    {
        $customer = Customer::where('id','=',$id)->first();
        // dd($customer->name);
        return $customer;
    }
}
