<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 1000; $i++) {
            Product::create([
                'category_id' =>  rand(1,10),
                'supplier_id' => 2,
                'gst_slab_id'=>rand(1,3),
                'title' => 'Book - '.$i,
                'author' => 'auther - '.$i,
                'isbn' => '0001'.$i,
                'price' => rand(100,9999),
                'publication_date' => date('Y-m-d'),
                'language' => 'ENG',
                'weight' => '100',
                'dimensions' => '200x200',
                'image' => 'data',
                'pages' => rand(100,300),
                'description' => 'data',
                'created_by' => '1',
           
            ]);
        }
    }
}
