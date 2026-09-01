<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /*
    |--------------------------------------------------------------------------
    | MASS ASSIGNMENT
    |--------------------------------------------------------------------------
    */

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'company_name',
        'website',
        'address',
        'profile_photo',
    ];


    /*
    |--------------------------------------------------------------------------
    | HIDDEN
    |--------------------------------------------------------------------------
    */

    protected $hidden = [
        'password',
        'remember_token',
    ];


    /*
    |--------------------------------------------------------------------------
    | CLIENT INVOICES
    |--------------------------------------------------------------------------
    |
    | One client can have many invoices.
    |
    */

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'client_id');
    }


    /*
    |--------------------------------------------------------------------------
    | CLIENT PROJECTS
    |--------------------------------------------------------------------------
    */

    public function projects()
    {
        return $this->hasMany(Project::class, 'client_id');
    }


    /*
    |--------------------------------------------------------------------------
    | CLIENT TICKETS
    |--------------------------------------------------------------------------
    */

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'user_id');
    }
}