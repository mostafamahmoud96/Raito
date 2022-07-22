<?php

namespace Modules\CustomerModule\Services;

use App\Helpers\UploaderHelper;
use Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Modules\CustomerModule\Repository\CustomerRepository;

class CustomerService
{
    // use UploaderHelper;

    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;

    }
    public function findWhere($arr)
    {
        // dd($arr);
        return $this->customerRepository->findWhere($arr);
    }
    public function findAll()
    {
        return $this->customerRepository->all();

    }


    public function findWithFilter($request)
    {
    // dd($request);
        return $this->customerRepository->findWithFilter($request);

    }
    public function findCustomer($request)
    {
        // dd($request);
    // dd($request->all()->name);
        return $this->customerRepository->findCustomer($request);

    }
    public function findOne($id)
    {
        // dd($id);
        return $this->customerRepository->find($id);
    }

    public function updateActivation($id)
    {
        $customer = $this->customerRepository->find($id);
        if ($customer->is_active == 0) {
            $is_active = 1;
        } else {
            $is_active = 0;

        }
        $active_data = [
            'is_active' => $is_active,
        ];
        return $this->customerRepository->update($active_data, $id);
    }

    public function login($data)
    {
        $customer = $this->customerRepository->findWhere(
            [
                'phone' => $data['phone'],
            ]
        )->first();
        if (!$customer) {
            return null;
        }

        // is the passwords match?
        if (!Hash::check($data['password'], $customer->password)) {
            return null;
        }

        //Auth::login($customer);
        //$auth_customer = Auth::user();

        ///update push_token if found//
        if (key_exists('push_token', $data)) {
            $this->customerRepository->updatePushToken($customer->id, $data['push_token']);
            $customer->push_token = $data['push_token'];
        }
        $customer->token = $customer->createToken('token')->accessToken;
        ///////////////////////////
        return $customer;
    }

    public function checkExistPass($customer_id, $old_pass)
    {
        $customer_pass = $this->customerRepository->getPass($customer_id);

        if (!Hash::check($old_pass, $customer_pass)) {
            return false;
        }
        return true;
    }

    public function logout()
    {
        $customer = auth()->user();
        $this->customerRepository->logout($customer->id);
    }

    public function register($data)
    {
        $client_data = $this->validationUpdateOrRegister($data);
        // dd($client_data);
        return $this->customerRepository->create($client_data);
    }
    public function create($requests)
    {

        $customer_data = [
            'name' => $requests['name'],
            'username' => $requests['username'],
            'password' => bcrypt($requests['password']),

        ];

        return $this->customerRepository->create($customer_data);
    }

    public function update($data)
    {
        $customer_data = [
            'name' => $data->name,
            'email' => $data->email,
            'address' => $data->address
        ];
        if ($data->password != null) {
            $customer_data['password'] = bcrypt($data['password']);
        }

        return $this->customerRepository->update($customer_data, $data->id);

    }

    private function validationUpdateOrRegister($data)
    {
        $customer_data = [];
        if (key_exists('name', $data)) {
            $customer_data['name'] = $data['name'];
        }

        if (key_exists('phone', $data)) {
            $customer_data['phone'] = $data['phone'];
        }


        return $customer_data;
    }

    public function unPaidOrders($data)
    {
        // dd($this);
      return $data->orders()->where(['is_paid' =>0]);
    }

    public function deleteOne($id)
    {
        $customer = $this->customerRepository->findWhere(['id' => $id])->first();
        // dd($customer);
        return $customer->delete();
    }

}
