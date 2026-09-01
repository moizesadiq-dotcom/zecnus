<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'title',
        'category',
        'description',
        'budget',
        'deadline',
        'progress',
        'status',
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}