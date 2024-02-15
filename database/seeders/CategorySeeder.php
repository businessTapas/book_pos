<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Category::create([
                'name'=>'Category - '.$i,
                'icon'=>'none',
                'code'=>'000'.$i,
                'shortname'=>"ct".$i,
                'created_by'=>1
            ]);
        }
    }
}
