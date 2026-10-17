@extends('layouts.app')
@section('title', 'Education')
@section('content')
<div class="eyebrow">Your background</div>
<h1 class="page-title">Education</h1>
<p class="page-sub">Add your school, course, and the years you studied.</p>

<form method="POST" action="/education" class="card">
    @csrf
    <h3>Add education</h3>
    <div class="grid cols-2">
        <div>
            <label for="school">School</label>
            <input id="school" type="text" name="school" value="{{ old('school') }}" required>
            @error('school')<div class="error">{{ $message }}</div>@enderror
        </div>
        <div>
            <label for="degree">Degree or course</label>
            <input id="degree" type="text" name="degree" value="{{ old('degree') }}" placeholder="e.g. BS Information Technology" required>
            @error('degree')<div class="error">{{ $message }}</div>@enderror
        </div>
    </div>

    <label for="years">Years <span style="color:var(--muted);font-weight:400">(optional)</span></label>
    <input id="years" type="text" name="years" value="{{ old('years') }}" placeholder="e.g. 2023 - Present">
    @error('years')<div class="error">{{ $message }}</div>@enderror

    <label for="details">Details <span style="color:var(--muted);font-weight:400">(optional)</span></label>
    <textarea id="details" name="details" style="min-height:90px">{{ old('details') }}</textarea>
    @error('details')<div class="error">{{ $message }}</div>@enderror

    <button type="submit" class="btn" style="margin-top:1.2rem">Add education</button>
</form>

<div class="list">
    @forelse ($entries as $entry)
        <div class="item">
            <div>
                <strong>{{ $entry->degree }}</strong>
                <div class="meta">{{ $entry->school }}@if ($entry->years) &middot; {{ $entry->years }}@endif</div>
                @if ($entry->details)<p class="desc">{{ $entry->details }}</p>@endif
            </div>
            <form method="POST" action="/education/{{ $entry->id }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn danger">Delete</button>
            </form>
        </div>
    @empty
        <div class="card"><p class="sub" style="margin:0">No education added yet. Add your school above.</p></div>
    @endforelse
</div>
@endsection