<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('12345678'),
        ]);

        Category::factory(15)->create();

        Category::create([
            'name' => 'Pria',
            'slug' => 'pria'
        ]);
        Category::create([
            'name' => 'Wanita',
            'slug' => 'wanita'
        ]);
        Category::create([
            'name' => 'Dalaman Pria',
            'slug' => 'dalaman-pria'
        ]);
    }
}
