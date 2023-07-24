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



        $this->call((UsersDatabase::class));
        $this->call((CategoryDatabase::class));
        $this->call((PublisherDatabase::class));
        $this->call((AuthorDatabase::class));
        $this->call((BooksDatabase::class));
        $this->call((InvoicesDatabase::class));
        $this->call((OrdersDatabase::class));
    }
}
