<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'key' => 'billing_footer',
            'value' => 'Created with  by TimD - Tim Digital'

        ]);

        Setting::create([
            'key' => 'billing_footer1',
            'value'=> 'Laravel'
        ]);
    }
}
