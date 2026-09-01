<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [

        'title',

        'category',

        'description',

        'image',

        'project_url',

        'technologies',

        'is_featured',

    ];


    protected $casts = [

        'is_featured' => 'boolean',

    ];
}