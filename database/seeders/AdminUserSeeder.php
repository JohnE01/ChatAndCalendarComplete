<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Find the user with the email 'admin@gmail.com'
        $user = User::where('email', 'admin@gmail.com')->first();

        if ($user) {
            // Retrieve the 'admin' role
            $adminRole = Role::where('name', 'admin')->first();

            if ($adminRole) {
                // Attach the 'admin' role to the user
                $user->roles()->syncWithoutDetaching([$adminRole->id]);
                $this->command->info("User 'admin@gmail.com' has been set as an admin.");
            } else {
                $this->command->error("The 'admin' role does not exist.");
            }
        } else {
            $this->command->error("User 'admin@gmail.com' not found.");
        }
    }
}
