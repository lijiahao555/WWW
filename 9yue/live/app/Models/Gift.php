<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Gift
 */
class Gift extends Model
{
    protected $table = 'gift';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'img',
        'money'
    ];

    protected $guarded = [];

        
}