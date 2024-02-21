<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CategoryProduct;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'username' => 'Admin',
            'first_name' => 'Muhammad Fikri',
            'last_name' => 'Ramadhan',
            'full_name' => 'Muhammad Fikri Ramadhan',
            'nohp' => '087788604592',
            'email' => 'admin@gmail.com',
            'gender' => 'Laki-Laki',
            'level' => 'admin',
            'password' => bcrypt('admin'),
            'tgllahir' => '12/23/2000',
            'check' => ('1'),
            'token' => Str::uuid(),
        ]);

        User::create([
            'username' => 'User',
            'first_name' => 'Jajang Saraja',
            'last_name' => 'Mangja',
            'full_name' => 'Jajang Saraja Mangja',
            'nohp' => '087788652932',
            'email' => 'user01@gmail.com',
            'gender' => 'Laki-Laki',
            'level' => 'users',
            'check' => ('1'),
            'password' => bcrypt('user01'),
            'tgllahir' => '02/23/2000',
            'token' => Str::uuid(),
        ]);

        CategoryProduct::create([
            'name_category' => 'Sepatu Olahraga',
            'slug' => 'sepatu-olahraga'
        ]);
    }
}
