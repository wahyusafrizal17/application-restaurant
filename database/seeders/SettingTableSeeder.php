<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new Setting;
        $setting->create(
            [
                'name'      => 'WAYYY CAFE',
                'address'   => 'Jl pesantren cimahi utara',
                'images'    => 'logo.png',
                'instagram' => 'wahyuu.sz',
                'phone'     => '081318960576',
            ]
        );
    }
}
