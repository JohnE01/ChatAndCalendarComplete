<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function makeAdmin()
    {
        // Retrieve the user with email 'admin@gmail.com'
        $user = User::where('email', 'admin@gmail.com')->first();

        // Ensure the user exists
        if ($user) {
            // Retrieve the 'admin' role
            $adminRole = Role::where('name', 'admin')->first();

            // Ensure the 'admin' role exists
            if ($adminRole) {
                // Attach the 'admin' role to the user
                $user->roles()->attach($adminRole);

                // Optionally, you might want to inform the user or log the action
                return "User with email 'admin@gmail.com' has been granted admin privileges.";
            } else {
                return "The 'admin' role does not exist.";
            }
        } else {
            return "User with email 'admin@gmail.com' does not exist.";
        }
    }
}
