<?php

namespace Modules\AdminModule\Services;

use App\Helpers\UploaderHelper;
use Modules\AdminModule\Repository\AdminRepository;
use Modules\CustomerModule\Repository\CustomerRepository;

class AdminService
{
    private $adminRepository;
    // use UploaderHelper;
    public function __construct(AdminRepository $adminRepository,CustomerRepository $customerRepository)
    {

        $this->adminRepository = $adminRepository;
        $this->customerRepository = $customerRepository;

    }

    public function findAll()
    {
        return $this->adminRepository->findAll();
    }
    public function findOne($id)
    {
        return $this->adminRepository->find($id);
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
            'username' => $data->username,
            'first_password' => $data->first_password,
        ];
        if ($data->password != null) {
            $customer_data['password'] = bcrypt($data['password']);
        }

        return $this->customerRepository->update($customer_data, $data->id);

    }

    /*public function getAdminPermissions()
    {
    return $this->adminRepository->getPermissions();
    }*/
    public function deleteOne($id)
    {
        $customer = $this->customerRepository->findWhere(['id' => $id])->first();
        // dd($customer);
        return $customer->delete();
    }

}
