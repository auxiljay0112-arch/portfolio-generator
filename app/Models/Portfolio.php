<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Portfolio extends Model
{
    public const TEMPLATES = ['modern', 'minimal', 'creative'];

    protected $fillable = [
        'user_id', 'slug', 'name', 'title', 'bio', 'email',
        'location', 'photo_url', 'template', 'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    /**
     * Get the portfolio that belongs to a user, creating it on first use.
     */
    public static function forUser($user): self
    {
        $portfolio = static::where('user_id', $user->id)->first();

        if ($portfolio) {
            return $portfolio;
        }

        $base = Str::slug($user->name) ?: 'portfolio';
        $slug = $base;

        while (static::where('slug', $slug)->exists()) {
            $slug = $base . '-' . Str::lower(Str::random(4));
        }

        return static::create([
            'user_id' => $user->id,
            'slug' => $slug,
            'name' => $user->name,
            'email' => $user->email,
            'template' => 'modern',
            'is_published' => false,
        ]);
    }

    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function education(): HasMany
    {
        return $this->hasMany(Education::class);
    }

    public function completion(): int
    {
        $checks = [
            filled($this->name),
            filled($this->title),
            filled($this->email),
            filled($this->location),
            filled($this->bio),
            $this->skills()->exists(),
            $this->projects()->exists(),
            $this->education()->exists(),
        ];

        return (int) round(count(array_filter($checks)) / count($checks) * 100);
    }
}