<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Store;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(4)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            DestrictSeeder::class,
            // StoreSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            // CategorySeeder::class,
            // StorageSiteSeeder::class,
            // StorageLocationSeeder::class,
            // RackSeeder::class,
            // GstslabSeeder::class,
            // BookSeeder::class,
            // CustomerSeeder::class,
            // MasterStockerSeeder::class,
            SettingSeeder::class,
            UnitSeeder::class,
            // AuthorSeeder::class,
        ]);
    }
}
