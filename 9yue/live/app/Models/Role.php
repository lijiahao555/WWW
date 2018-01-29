<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 */
class Role extends Model
{
    protected $table = 'role';

    public $timestamps = false;

    protected $fillable = [
        'role_name'
    ];

    protected $guarded = [];

        
}