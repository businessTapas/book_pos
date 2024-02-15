<?php

namespace Database\Seeders;

use App\Models\Rack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Rack::create([
                'name'=>'Rack - '.$i,
                'position'=>$i,
                'storage_site_id'=>$i,
                'storage_location_id'=>$i,
                'description'=>'000'.$i,
                'created_by'=>1,
                'storage_site_id'=>2
            ]);
        }
    }
}
