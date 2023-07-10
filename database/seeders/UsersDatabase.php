<?php

namespace Database\Seeders;

use http\Client\Curl\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create(
            [
                'name' => 'Admin1',
                'email' => 'admin1@gmail.com',
                'isAdmin'=>true,
                'level'=>0,
                'phone'=>'0123456789',
                'address'=>'Cau Giay',
                'user_province'=>'1',
                'password'=> Hash::make('admin123')

            ]
        );
        // tao cho 1 nguoi dung

        \App\Models\User::factory()->create(
            [
                'name' => 'Editor1',
                'email' => 'editor1@gmail.com',
                'isAdmin'=>true,
                'level'=>1,
                'phone'=>'0387654198',
                'address'=>'Hoan Kiem',
                'user_province'=>'2',
                'password'=> Hash::make('editor123')

            ]
        );

        \App\Models\User::factory()->create(
            [
                'name' => 'User1',
                'email' => 'user1@gmail.com',
                'isAdmin'=>false,
                'level'=>2,
                'phone'=>'0123456789',
                'address'=>'Ba Dinh',
                'user_province'=>'1',
                'password'=> Hash::make('user123')
            ]
        );
        // tao cho 1 nguoi dung
    }
}
