<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::create([
            'name'=>'unit 1',
            'description' =>'Test Description 1',
        ]);
        Unit::create([
            'name' => 'unit 2',
            'description' => 'Test Description 2',
        ]);
        Unit::create([
            'name' => 'unit 3',
            'description' => 'Test Description 3',
        ]);
        Unit::create([
            'name' => 'unit 4',
            'description'=> 'Test Description 4'
        ]);
    }
}
