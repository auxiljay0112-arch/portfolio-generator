@extends('layouts.app')
@section('title', 'Publish / Export')
@section('content')
<div class="eyebrow">Go live</div>
<h1 class="page-title">Publish / Export</h1>
<p class="page-sub">Share your portfolio with a public link, or download it as a file.</p>

<div class="grid cols-2">
    <div class="card">
        <h3>Public link</h3>
        <p class="sub">
            Status:
            <strong style="color: {{ $portfolio->is_published ? '#86efac' : '#fca5a5' }}">{{ $portfolio->is_published ? 'Published' : 'Private' }}</strong>
        </p>

        <label for="link">Your link</label>
        <input type="text" id="link" value="{{ url('/p/' . $portfolio->slug) }}" readonly>

        <div style="display:flex;gap:.6rem;margin-top:.8rem;flex-wrap:wrap">
            <button type="button" class="btn ghost" onclick="navigator.clipboard.writeText(document.getElementById('link').value); this.textContent='Copied!'">Copy link</button>
            @if ($portfolio->is_published)
                <a href="/p/{{ $portfolio->slug }}" target="_blank" class="btn ghost">Open &#8599;</a>
            @endif
        </div>

        <form method="POST" action="/publish" style="margin-top:1rem">
            @csrf
            <button type="submit" class="btn {{ $portfolio->is_published ? 'danger' : '' }}">
                {{ $portfolio->is_published ? 'Unpublish' : 'Publish portfolio' }}
            </button>
        </form>
    </div>

    <div class="card">
        <h3>Link name</h3>
        <p class="sub">Choose the end of your link. Use lowercase letters, numbers, and hyphens.</p>
        <form method="POST" action="/publish/slug">
            @csrf
            <label for="slug">/p/</label>
            <input id="slug" type="text" name="slug" value="{{ old('slug', $portfolio->slug) }}" required>
            @error('slug')<div class="error">{{ $message }}</div>@enderror
            <button type="submit" class="btn ghost" style="margin-top:.8rem">Save link</button>
        </form>

        <h3 style="margin-top:1.6rem">Export</h3>
        <p class="sub">Download your portfolio as one HTML file you can host anywhere.</p>
        <a href="/export" class="btn">Download HTML</a>
    </div>
</div>
@endsection