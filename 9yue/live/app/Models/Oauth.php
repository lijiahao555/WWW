<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Oauth
 */
class Oauth extends Model
{
    protected $table = 'oauth';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'config',
        'file',
        'description',
        'is_colse',
        'logo'
    ];

    protected $guarded = [];

        
}