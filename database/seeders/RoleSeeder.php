<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = array(
          
            [
                'name' => "admin",
                'type' => "retail-store",
            ],
            [
                'name' => "excutive",
                'type' => "retail-store",
            ],
            [
                'name' => "admin",
                'type' => "central-store",
            ],
            [
                'name' => "excutive",
                'type' => "central-store",
            ],
            [
                'name' => "admin",
                'type' => "publisher",
            ],
            [
                'name' => "excutive",
                'type' => "publisher",
            ],
        );

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
