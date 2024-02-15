<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::create([
            'name'=>'Rabindranath Tagore',
            'description'=> 'Indian poet'
        ]);
        Author::create([
            'name'=>'Kazi Nazrul Islam',
            'description'=> 'poet,philosopher'
        ]);
        Author::create([
            'name'=>'Nabaneeta Dev Sen',
            'description'=> 'writer and poet'
        ]);
        Author::create([
            'name'=>'Sukanta Bhattacharya',
            'description'=> 'poet'
        ]);
        Author::create([
            'name'=>'Tarapada Roy',
            'description'=> 'poet,short-story writer'
        ]);
    }
}
