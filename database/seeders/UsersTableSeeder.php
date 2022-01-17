<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('password');

        $data = [
            ['name'=>'Wahyu Safrizal','email'=>'wahyusafrizal174@gmail.com','password'=> $password, 'level' => 'admin'],
            ['name'=>'Anna Yulia Apriyani','email'=>'annayulia170402@gmail.com','password'=> $password, 'level' => 'petugas']
        ];

        User::insert($data);
    }
}
