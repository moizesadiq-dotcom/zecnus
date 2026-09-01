<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'client_id',
        'title',
        'category',
        'description',
        'location',
        'budget',
        'deadline',
        'progress',
        'status',
    ];

    protected $casts = [
        'budget' => 'decimal:2',
        'deadline' => 'date',
        'progress' => 'integer',
    ];

    /*
    |--------------------------------------------------------------------------
    | PROJECT BELONGS TO CLIENT
    |--------------------------------------------------------------------------
    */

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}