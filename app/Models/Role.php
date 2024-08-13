<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'g51_roles';

    // Define the relationship with users
    public function users()
    {
        return $this->belongsToMany(User::class, 'g51_role_user', 'role_id', 'user_id');
    }
}
