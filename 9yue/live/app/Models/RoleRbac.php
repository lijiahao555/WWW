<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RoleRbac
 */
class RoleRbac extends Model
{
    protected $table = 'role_rbac';

    public $timestamps = false;

    protected $fillable = [
        'role_id',
        'rbac_id'
    ];

    protected $guarded = [];

        
}