<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Project;
use App\Models\Portfolio;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();

        $projects = Project::latest()->get();

        $portfolios = Portfolio::where('is_featured', true)
            ->latest()
            ->get();

        return view(
            'home',
            compact(
                'services',
                'projects',
                'portfolios'
            )
        );
    }
}