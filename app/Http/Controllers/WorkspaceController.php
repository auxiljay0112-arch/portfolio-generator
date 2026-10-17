<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class WorkspaceController
{
    private function portfolio(): Portfolio
    {
        return Portfolio::forUser(auth()->user());
    }

    /**
     * Render a portfolio with its chosen template.
     */
    public static function renderPortfolio(Portfolio $portfolio)
    {
        $template = in_array($portfolio->template, Portfolio::TEMPLATES, true)
            ? $portfolio->template
            : 'modern';

        return view('templates.' . $template, [
            'portfolio' => $portfolio,
            'skills' => $portfolio->skills()->orderBy('category')->orderBy('name')->get()->groupBy('category'),
            'projects' => $portfolio->projects()->latest()->get(),
            'education' => $portfolio->education()->latest()->get(),
        ]);
    }

    public function dashboard()
    {
        $portfolio = $this->portfolio();

        $stats = [
            'completion' => $portfolio->completion(),
            'projects' => $portfolio->projects()->count(),
            'skills' => $portfolio->skills()->count(),
        ];

        $steps = [
            ['label' => 'Complete your profile', 'done' => filled($portfolio->title) && filled($portfolio->bio), 'url' => '/profile'],
            ['label' => 'Add a project', 'done' => $stats['projects'] > 0, 'url' => '/projects'],
            ['label' => 'List your skills', 'done' => $stats['skills'] > 0, 'url' => '/skills'],
            ['label' => 'Add your education', 'done' => $portfolio->education()->exists(), 'url' => '/education'],
            ['label' => 'Publish your portfolio', 'done' => $portfolio->is_published, 'url' => '/publish'],
        ];

        return view('workspace.dashboard', compact('portfolio', 'stats', 'steps'));
    }

    public function profile()
    {
        return view('workspace.profile', ['portfolio' => $this->portfolio()]);
    }

    public function updateProfile(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'title' => 'nullable|string|max:100',
            'email' => 'nullable|email|max:150',
            'location' => 'nullable|string|max:100',
            'photo_url' => 'nullable|url:http,https|max:255',
            'bio' => 'nullable|string|max:1500',
        ]);

        $this->portfolio()->update($data);

        return back()->with('status', 'Profile saved.');
    }

    public function templates()
    {
        return view('workspace.templates', ['portfolio' => $this->portfolio()]);
    }

    public function chooseTemplate(Request $request)
    {
        $data = $request->validate([
            'template' => 'required|in:' . implode(',', Portfolio::TEMPLATES),
        ]);

        $this->portfolio()->update($data);

        return back()->with('status', ucfirst($data['template']) . ' template selected.');
    }

    public function preview()
    {
        return view('workspace.preview', ['portfolio' => $this->portfolio()]);
    }

    public function previewFrame()
    {
        return self::renderPortfolio($this->portfolio());
    }

    public function publish()
    {
        return view('workspace.publish', ['portfolio' => $this->portfolio()]);
    }

    public function togglePublish()
    {
        $portfolio = $this->portfolio();
        $portfolio->update(['is_published' => ! $portfolio->is_published]);

        return back()->with(
            'status',
            $portfolio->is_published ? 'Your portfolio is now public.' : 'Your portfolio is now private.'
        );
    }

    public function updateSlug(Request $request)
    {
        $portfolio = $this->portfolio();

        $data = $request->validate([
            'slug' => [
                'required',
                'string',
                'max:60',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                'unique:portfolios,slug,' . $portfolio->id,
            ],
        ]);

        $portfolio->update($data);

        return back()->with('status', 'Link updated.');
    }

    public function export()
    {
        $html = self::renderPortfolio($this->portfolio())->render();

        return response($html, 200, [
            'Content-Type' => 'text/html; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="portfolio.html"',
        ]);
    }
}