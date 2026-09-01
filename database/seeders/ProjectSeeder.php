<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\User;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        // Pehle check karein koi user hai ya nahi, warna default ID 1 use ho gi
        $userId = User::first()->id ?? 1;

        Project::create([
            'client_id' => $userId,
            'title' => 'E-Commerce Platform Redesign',
            'category' => 'Web Application',
            'description' => 'Full stack e-commerce web app built with Laravel and Tailwind CSS.',
            'progress' => 65,
            'status' => 'In Progress'
        ]);

        Project::create([
            'client_id' => $userId,
            'title' => 'Salon Management System',
            'category' => 'Software Portal',
            'description' => 'Appointment booking and admin control panel.',
            'progress' => 90,
            'status' => 'In Progress'
        ]);
    }
}