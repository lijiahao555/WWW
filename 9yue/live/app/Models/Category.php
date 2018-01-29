<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 */
class Category extends Model
{
    protected $table = 'category';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'parent_id',
        'sort',
        'visibility'
    ];

    protected $guarded = [];

        
}