<?php

namespace Database\Seeders;

use App\Models\Customer;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Customer::create([
                'name' => 'Customer - ' . $i,
                'email' => Factory::create()->email(),
                'phone' => rand(7777777777, 9999999999),
                'created_by' => 1
            ]);
        }
    }
}
