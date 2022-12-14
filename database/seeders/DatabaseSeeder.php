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

        // tao cho 1 nguoi dung

        $this->call((AreasDatabase::class));
        $this->call((CityDatabase::class));
        $this->call((UsersDatabase::class));
        $this->call((CategoryDatabase::class));
        $this->call((PublisherDatabase::class));
        $this->call((AuthorDatabase::class));
        $this->call((BooksDatabase::class));
    }
}
