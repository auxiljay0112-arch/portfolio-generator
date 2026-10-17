<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class EducationController
{
    public function index()
    {
        $portfolio = Portfolio::forUser(auth()->user());

        return view('workspace.education', [
            'portfolio' => $portfolio,
            'entries' => $portfolio->education()->latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'school' => 'required|string|max:120',
            'degree' => 'required|string|max:120',
            'years' => 'nullable|string|max:40',
            'details' => 'nullable|string|max:600',
        ]);

        Portfolio::forUser(auth()->user())->education()->create($data);

        return back()->with('status', 'Education added.');
    }

    public function destroy(int $id)
    {
        Portfolio::forUser(auth()->user())->education()->findOrFail($id)->delete();

        return back()->with('status', 'Education removed.');
    }
}