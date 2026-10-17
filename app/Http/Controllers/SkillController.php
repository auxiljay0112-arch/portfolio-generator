<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class SkillController
{
    public const CATEGORIES = ['Frontend', 'Backend', 'Database', 'Tools', 'Design', 'Other'];

    public function index()
    {
        $portfolio = Portfolio::forUser(auth()->user());

        return view('workspace.skills', [
            'portfolio' => $portfolio,
            'skills' => $portfolio->skills()->orderBy('category')->orderBy('name')->get()->groupBy('category'),
            'categories' => self::CATEGORIES,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'category' => 'required|in:' . implode(',', self::CATEGORIES),
        ]);

        Portfolio::forUser(auth()->user())->skills()->create($data);

        return back()->with('status', 'Skill added.');
    }

    public function destroy(int $id)
    {
        Portfolio::forUser(auth()->user())->skills()->findOrFail($id)->delete();

        return back()->with('status', 'Skill removed.');
    }
}