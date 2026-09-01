<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // <-- Yeh add karna zaroori hai

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::latest()->get();

        return view('admin.portfolio.index', [
            'portfolios' => $portfolios,
        ]);
    }

    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'project_url' => 'nullable|url|max:255',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'project_url' => $request->project_url,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('portfolio', 'public');
        }

        Portfolio::create($data);

        return redirect()
            ->route('admin.portfolio')
            ->with('success', 'Portfolio added successfully.');
    }

    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit', [
            'portfolio' => $portfolio,
        ]);
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'project_url' => 'nullable|url|max:255',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'project_url' => $request->project_url,
        ];

        // Agar nayi image upload ki gayi hai
        if ($request->hasFile('image')) {
            // 1. Purani image delete karein agar exist karti hai
            if ($portfolio->image && Storage::disk('public')->exists($portfolio->image)) {
                Storage::disk('public')->delete($portfolio->image);
            }

            // 2. Nayi image store karein
            $data['image'] = $request->file('image')->store('portfolio', 'public');
        }

        $portfolio->update($data);

        return redirect()
            ->route('admin.portfolio')
            ->with('success', 'Portfolio updated successfully.');
    }

    public function destroy(Portfolio $portfolio)
    {
        // Record delete hone se pehle uski image storage se delete karein
        if ($portfolio->image && Storage::disk('public')->exists($portfolio->image)) {
            Storage::disk('public')->delete($portfolio->image);
        }

        $portfolio->delete();

        return redirect()
            ->route('admin.portfolio')
            ->with('success', 'Portfolio deleted successfully.');
    }

    public function publicIndex()
    {
        $portfolios = Portfolio::latest()->get();

        return view('portfolios', [
            'portfolios' => $portfolios,
        ]);
    }
}