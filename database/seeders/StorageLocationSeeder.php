<?php

namespace Database\Seeders;

use App\Models\StorageLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StorageLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            StorageLocation::create([
                'name'=>'StorageLocation - '.$i,
                'sub_location_name'=>'location-'. $i,
                'description'=>'none',
                'storage_site_id'=> $i,
                'created_by'=>1
            ]);
        }
    }
}
