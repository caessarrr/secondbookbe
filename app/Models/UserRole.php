<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $fillable = [
        'user_id', 'role_id',
    ];

    // Define the table name
    protected $table = 'user_roles';
}
