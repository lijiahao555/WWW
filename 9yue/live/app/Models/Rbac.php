<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rbac
 */
class Rbac extends Model
{
    protected $table = 'rbac';

    public $timestamps = false;

    protected $fillable = [
        'rbac_route'
    ];

    protected $guarded = [];

        
}