<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */             
    public function run()
    {

    $users = array(
            [
                'name' => "admin",
                'email' => "admin@ica.book.store.com",
                'type' => "admin",
                'role_id' => 1,
                
                'password' => Hash::make("admin1234@"),

            ],
            // [
            //     'name' => "publisher for store 2",
            //     'email' => "publisher@ica.book.store.com",
            //     'type' => "publisher",
            //     'role_id' => 1,
            //     'store_id' => "2",
            //     'password' => Hash::make("publisher@1234"),

            // ],
            // [
            //     'name' => "publisher for store 3",
            //     'email' => "publisher3@ica.book.store.com",
            //     'type' => "publisher",
            //     'role_id' => 1,
            //     'store_id' => "3",
            //     'password' => Hash::make("publisher@1234"),

            // ],
            // [
            //     'name' => "publisher for store 4",
            //     'email' => "publisher4@ica.book.store.com",
            //     'type' => "publisher",
            //     'role_id' => 1,
            //     'store_id' => "4",
            //     'password' => Hash::make("publisher@1234"),

            // ],

            // [
            //     'name' => "central",
            //     'email' => "central@ica.book.store.com",
            //     'type' => "central-store",
            //     'role_id' => 2,
            //     'store_id' => "2",
            //     'password' => Hash::make("central@1234"),

            // ],
            // [
            //     'name' => "central",
            //     'email' => "central3@ica.book.store.com",
            //     'type' => "central-store",
            //     'role_id' => 2,
            //     'store_id' => "3",
            //     'password' => Hash::make("central@1234"),

            // ],
            // [
            //     'name' => "central",
            //     'email' => "central4@ica.book.store.com",
            //     'type' => "central-store",
            //     'role_id' => 2,
            //     'store_id' => "4",
            //     'password' => Hash::make("central@1234"),

            // ],
            // [
            //     'name' => "retail",
            //     'email' => "retail@ica.book.store.com",
            //     'type' => "retail-store",
            //     'role_id' => 1,
            //     'store_id' => "1",
            //     'password' => Hash::make("retail@1234"),

            // ],
            // [
            //     'name' => "retail",
            //     'email' => "retail5@ica.book.store.com",
            //     'type' => "retail-store",
            //     'role_id' => 1,
            //     'store_id' => "5",
            //     'password' => Hash::make("retail@1234"),

            // ],
        );

        foreach($users as $user){
            User::create($user);
        }

    }
}
