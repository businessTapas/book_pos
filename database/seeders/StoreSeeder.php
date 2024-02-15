<?php
namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = array(
            [
                'district_id' => rand(1,700),
                'store_name' => 'Store ratail 1',
                'type' => 'retail-store',
                'address' => 'kolkata',
            ],
            [
                'district_id' => rand(1,700),
                'store_name' => 'Store center 1',
                'type' => 'central-store',
                'address' => 'kolkata',
            ],
            [
                'district_id' => rand(1,700),
                'store_name' => 'Store center 2',
                'type' => 'central-store',
                'address' => 'kolkata',
            ],
            [
                'district_id' => rand(1,700),
                'store_name' => 'Store center 3',
                'type' => 'central-store',
                'address' => 'kolkata',
            ],
            [
                'district_id' => rand(1,700),
                'store_name' => 'Store retail 2',
                'type' => 'retail-store',
                'address' => 'kolkata',
            ]
            );

        foreach ($stores as $store) {
            Store::create($store);
        }
    }
}
