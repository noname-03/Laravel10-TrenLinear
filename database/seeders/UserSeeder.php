<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Samuel',
            'email' => 'samuel@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        Role::create(['name' => 'admin']);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'samuel1',
            'email' => 'samuel1@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        Role::create(['name' => 'user']);
        $user->assignRole('user');
    }
}