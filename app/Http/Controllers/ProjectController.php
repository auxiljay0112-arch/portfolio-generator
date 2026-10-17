<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class ProjectController
{
    public function index()
    {
        $portfolio = Portfolio::forUser(auth()->user());

        return view('workspace.projects', [
            'portfolio' => $portfolio,
            'projects' => $portfolio->projects()->latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'nullable|string|max:600',
            'link' => 'nullable|url:http,https|max:255',
            'tech' => 'nullable|string|max:150',
        ]);

        Portfolio::forUser(auth()->user())->projects()->create($data);

        return back()->with('status', 'Project added.');
    }

    public function destroy(int $id)
    {
        Portfolio::forUser(auth()->user())->projects()->findOrFail($id)->delete();

        return back()->with('status', 'Project deleted.');
    }
}