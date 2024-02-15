<?php

namespace Database\Seeders;

use App\Models\MasterStockInventery;
use App\Models\Product;
use App\Models\StorageSite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterStockerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = StorageSite::all();
        foreach ($stores as $store) {
            $products = Product::all();
            foreach ($products as $product) {
                MasterStockInventery::create([
                    'store_id' => $store->store_id,
                    'product_id' => $product->id,
                    'storage_site_id' => $store->id,
                    'storage_location_id' => rand(1, 10),
                    'rack_id' => rand(1, 10),
                    'qty' => rand(100, 9999),
                    'purchase_price' => rand(10, 10000),
                    'sale_price' => rand(10, 10000),
                    'supplier_price' => rand(5, 10000),
                    'discount_amount' => rand(1, 100),
                    'batch_no' => 'BT' . rand(100000, 999999)

                ]);
            }
        }
    }
}
