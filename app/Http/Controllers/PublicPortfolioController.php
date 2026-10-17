<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;

class PublicPortfolioController
{
    public function show(string $slug)
    {
        $portfolio = Portfolio::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return WorkspaceController::renderPortfolio($portfolio);
    }
}