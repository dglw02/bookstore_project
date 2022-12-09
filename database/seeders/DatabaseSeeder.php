<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use http\Client\Curl\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\User::factory()->create(
          [
              'name' => 'Admin1',
              'email' => 'duong@gmail.com',
              'isAdmin'=>true,
              'level'=>0,
              'phone'=>'0989296235',
              'password'=> Hash::make('admin123')

          ]
        );
        // tao cho 1 nguoi dung

        \App\Models\User::factory()->create(
            [
                'name' => 'User1',
                'email' => 'user1@gmail.com',
                'isAdmin'=>false,
                'level'=>0,
                'phone'=>'0123456789',
                'password'=> Hash::make('user123')
            ]
        );
        // tao cho 1 nguoi dung
    }
}
