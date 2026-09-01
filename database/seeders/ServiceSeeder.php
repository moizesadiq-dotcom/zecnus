<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['title' => 'Project Development', 'description' => 'Scalable, secure, and high-performance web applications.', 'icon' => 'fa-code', 'is_highlighted' => false],
            ['title' => 'Digital Solutions', 'description' => 'End-to-end cloud automation, SaaS products, and system integration.', 'icon' => 'fa-cube', 'is_highlighted' => true],
            ['title' => 'Digital Marketing', 'description' => 'Data-driven marketing campaigns designed to scale brand reach.', 'icon' => 'fa-bullhorn', 'is_highlighted' => false],
            ['title' => 'UI/UX Design', 'description' => 'User-centric interfaces and wireframes crafted for maximum conversion.', 'icon' => 'fa-pen-nib', 'is_highlighted' => false],
            ['title' => 'SEO & Analytics', 'description' => 'Search engine optimization and performance tracking for higher rankings.', 'icon' => 'fa-chart-line', 'is_highlighted' => false],
            ['title' => 'Custom Software', 'description' => 'Tailor-made CRM, ERP, and enterprise management tools.', 'icon' => 'fa-layer-group', 'is_highlighted' => false],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}