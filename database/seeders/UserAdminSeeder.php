<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserAdminSeeder extends Seeder
{
    public function run(): void
    {
        // DB::table('users')->insert(['name' => 'Admin', 'email' => 'admin@admin.com', 'password' => Hash::make('password'),]);
        User::find(51)->syncRoles(['super_admin']);
    }
}
