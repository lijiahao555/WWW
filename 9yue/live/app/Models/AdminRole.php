<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AdminRole
 */
class AdminRole extends Model
{
    protected $table = 'admin_role';

    public $timestamps = false;

    protected $fillable = [
        'admin_id',
        'role_id'
    ];

    protected $guarded = [];

        
}