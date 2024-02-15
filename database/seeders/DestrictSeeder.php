<?php

namespace Database\Seeders;

use App\Models\Destrict;
use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $destricts = [
            [
                'name' => 'kolkata',
                'state' => 'West Bangal',
                'country' => 'India',
            ]

        ];

        $district_json = file_get_contents(__DIR__ . '/_district.json');
        $states = json_decode($district_json);
    
        foreach ($states->states as $state => $districts) {
            foreach ($districts->districts as $district) {
              
                District::create([
                    'name' => $district,
                    'state' =>  $districts->state,
                    'country' => 'India'
                ]);
            }
        }
    }
}
