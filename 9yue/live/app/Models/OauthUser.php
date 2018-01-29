<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OauthUser
 */
class OauthUser extends Model
{
    protected $table = 'oauth_user';

    public $timestamps = false;

    protected $fillable = [
        'oauth_user_id',
        'user_id',
        'datetime',
        'oauth_id'
    ];

    protected $guarded = [];

        
}