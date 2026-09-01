<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject',
        'message',
        'status',
    ];

    /*
    |--------------------------------------------------------------------------
    | CLIENT RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    public function client()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}