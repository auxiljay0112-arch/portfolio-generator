<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioController
{
    public function create()
    {
        return view('portfolio.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'title' => 'nullable|string|max:100',
            'bio' => 'nullable|string|max:1000',
            'email' => 'nullable|email|max:150',
            'skills' => 'nullable|string|max:500',
        ]);

        $slug = Str::slug($data['name']);
        if ($slug === '') {
            $slug = 'portfolio-' . Str::lower(Str::random(6));
        }
        if (Portfolio::where('slug', $slug)->exists()) {
            $slug .= '-' . Str::lower(Str::random(4));
        }
        $data['slug'] = $slug;

        $portfolio = Portfolio::create($data);

        return redirect('/p/' . $portfolio->slug);
    }

    public function show(string $slug)
    {
        $portfolio = Portfolio::where('slug', $slug)->firstOrFail();
        $skills = array_filter(array_map('trim', explode(',', $portfolio->skills ?? '')));

        return view('portfolio.show', compact('portfolio', 'skills'));
    }
}