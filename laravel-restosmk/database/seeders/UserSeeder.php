<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt(123),
                'level' => 'admin'
            ],
            [
                'name' => 'kasir',
                'email' => 'kasir@gmail.com',
                'password' => bcrypt(123),
                'level' => 'kasir'
            ],
            [
                'name' => 'manager',
                'email' => 'manager@gmail.com',
                'password' => bcrypt(123),
                'level' => 'manager'
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
