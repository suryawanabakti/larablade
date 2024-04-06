<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = Role::create(['name' => 'user']);
        Role::create(['name' => 'admin']);
        $users = User::factory(50)->create();
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'date_of_birth' => now()->format('Y-m-d'),
        ]);
        $admin->assignRole('admin');
        $user->users()->attach($users);
    }
}
