<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Software House',
            'email' => 'admin@zacnus.com',
            'password' => Hash::make('password'), // Yahan aap apna password rakh sakte hain
            'role' => 'admin', // Yeh change karna hai
        ]);
    }
}