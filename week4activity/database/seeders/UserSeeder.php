<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(5)->create();

        $adminRole = Role::where('role_name', 'Admin')->first();
        $user = User::first();

        // Attach Admin role to first user
        if ($adminRole && $user) {
            $user->roles()->attach($adminRole->id);
        }

        // Attach random roles to remaining users
        $nonAdminRoles = Role::where('role_name', '!=', 'Admin')->get();

        if ($nonAdminRoles->isEmpty()) {
            return; // ⛔ Skip if no roles to assign
        }

        $nonAdminUsers = User::whereDoesntHave('roles', function ($query) {
            $query->where('role_name', 'Admin');
        })->get();

        foreach ($nonAdminUsers as $nonAdminUser) {
            $max = min(2, $nonAdminRoles->count());
            $randomRoles = $nonAdminRoles->random(rand(1, $max));
            $nonAdminUser->roles()->attach($randomRoles);
        }
    }
}
