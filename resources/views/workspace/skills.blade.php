@extends('layouts.app')
@section('title', 'Skills')
@section('content')
<div class="eyebrow">Your portfolio</div>
<h1 class="page-title">Skills</h1>
<p class="page-sub">List the programming languages, tools, and abilities you have learned.</p>

<form method="POST" action="/skills" class="card">
    @csrf
    <div class="addrow">
        <div style="flex:2">
            <label for="name">Skill name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="e.g. Laravel" required>
        </div>
        <div>
            <label for="category">Category</label>
            <select id="category" name="category">
                @foreach ($categories as $category)
                    <option value="{{ $category }}" @selected(old('category') === $category)>{{ $category }}</option>
                @endforeach
            </select>
        </div>
        <div style="flex:0 0 auto;min-width:0">
            <button type="submit" class="btn">Add skill</button>
        </div>
    </div>
    @error('name')<div class="error">{{ $message }}</div>@enderror
    @error('category')<div class="error">{{ $message }}</div>@enderror
</form>

<div class="card" style="margin-top:1rem">
    <h3>Your skills</h3>
    <p class="sub">Remove a skill with the &times; button.</p>

    @if ($skills->isEmpty())
        <p class="sub" style="margin:0">No skills yet. Add your first one above.</p>
    @else
        <div class="tags">
            @foreach ($skills->flatten() as $skill)
                <span class="tag">
                    {{ $skill->name }}
                    <small>{{ $skill->category }}</small>
                    <form method="POST" action="/skills/{{ $skill->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Remove {{ $skill->name }}">&times;</button>
                    </form>
                </span>
            @endforeach
        </div>
    @endif
</div>
@endsection