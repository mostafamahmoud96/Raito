<?php

namespace Modules\AdminModule\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\AdminModule\Entities\Admin;

class AdminModuleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('admins')->truncate();
        Admin::create([
            'name' => "admin",
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);
       
    }
}
