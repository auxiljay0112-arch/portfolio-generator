@extends('layouts.app')
@section('title', 'My Projects')
@section('content')
<div class="eyebrow">Your work</div>
<h1 class="page-title">My Projects</h1>
<p class="page-sub">Showcase the best things you have built.</p>

<form method="POST" action="/projects" class="card">
    @csrf
    <h3>Add a project</h3>
    <div class="grid cols-2">
        <div>
            <label for="title">Project title</label>
            <input id="title" type="text" name="title" value="{{ old('title') }}" required>
            @error('title')<div class="error">{{ $message }}</div>@enderror
        </div>
        <div>
            <label for="link">Link <span style="color:var(--muted);font-weight:400">(optional)</span></label>
            <input id="link" type="url" name="link" value="{{ old('link') }}" placeholder="https://github.com/you/project">
            @error('link')<div class="error">{{ $message }}</div>@enderror
        </div>
    </div>

    <label for="tech">Technologies <span style="color:var(--muted);font-weight:400">(separate with commas)</span></label>
    <input id="tech" type="text" name="tech" value="{{ old('tech') }}" placeholder="Laravel, MySQL, CSS">
    @error('tech')<div class="error">{{ $message }}</div>@enderror

    <label for="description">Description</label>
    <textarea id="description" name="description" style="min-height:90px">{{ old('description') }}</textarea>
    @error('description')<div class="error">{{ $message }}</div>@enderror

    <button type="submit" class="btn" style="margin-top:1.2rem">Add project</button>
</form>

<div class="list">
    @forelse ($projects as $project)
        <div class="item">
            <div>
                <strong>{{ $project->title }}</strong>
                @if ($project->tech)<div class="meta">{{ $project->tech }}</div>@endif
                @if ($project->description)<p class="desc">{{ $project->description }}</p>@endif
                @if ($project->link)<a href="{{ $project->link }}" target="_blank" rel="noopener" style="color:var(--blue2);font-size:.9rem">{{ $project->link }}</a>@endif
            </div>
            <form method="POST" action="/projects/{{ $project->id }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn danger">Delete</button>
            </form>
        </div>
    @empty
        <div class="card"><p class="sub" style="margin:0">No projects yet. Add your first one above.</p></div>
    @endforelse
</div>
@endsection