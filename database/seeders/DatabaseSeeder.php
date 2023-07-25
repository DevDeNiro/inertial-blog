<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserAdminSeeder::class,
            UserSeeder::class,
            PostSeeder::class,
            MediaSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            CommentSeeder::class,
            RolePermissionSeeder::class,
        ]);
    }
}
