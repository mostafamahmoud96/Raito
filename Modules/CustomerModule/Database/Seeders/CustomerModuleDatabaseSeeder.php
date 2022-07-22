<?php

namespace Modules\CustomerModule\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\CustomerModule\Entities\Customer;

class CustomerModuleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('customers')->truncate();
        Customer::create([
            'name' => "customer",
            'email' => 'customer@gmail.com',
            'password' => bcrypt('customer'),
            'address' => 'test'
        ]);
        Customer::create([
            'name' => "customer_2",
            'email' => 'customer_2@gmail.com',
            'password' => bcrypt('customer'),
            'address' => 'test'

        ]);
        // $this->call("OthersTableSeeder");
    }
}
