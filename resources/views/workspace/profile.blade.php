@extends('layouts.app')
@section('title', 'My Profile')
@section('content')
<div class="eyebrow">Personal information</div>
<h1 class="page-title">My Profile</h1>
<p class="page-sub">Tell visitors who you are and what you want to achieve.</p>

<form method="POST" action="/profile" class="card">
    @csrf
    <h3>Basic Information</h3>
    <p class="sub">These details appear on your generated portfolio.</p>

    <div class="grid cols-2">
        <div>
            <label for="name">Full name</label>
            <input id="name" type="text" name="name" value="{{ old('name', $portfolio->name) }}" required>
            @error('name')<div class="error">{{ $message }}</div>@enderror
        </div>
        <div>
            <label for="title">Professional title</label>
            <input id="title" type="text" name="title" value="{{ old('title', $portfolio->title) }}" placeholder="e.g. BSIT Student &amp; Web Developer">
            @error('title')<div class="error">{{ $message }}</div>@enderror
        </div>
        <div>
            <label for="email">Email address</label>
            <input id="email" type="email" name="email" value="{{ old('email', $portfolio->email) }}">
            @error('email')<div class="error">{{ $message }}</div>@enderror
        </div>
        <div>
            <label for="location">Location</label>
            <input id="location" type="text" name="location" value="{{ old('location', $portfolio->location) }}" placeholder="e.g. Cebu City, Philippines">
            @error('location')<div class="error">{{ $message }}</div>@enderror
        </div>
    </div>

    <label for="photo_url">Profile photo URL <span style="color:var(--muted);font-weight:400">(optional)</span></label>
    <input id="photo_url" type="url" name="photo_url" value="{{ old('photo_url', $portfolio->photo_url) }}" placeholder="https://example.com/photo.jpg">
    @error('photo_url')<div class="error">{{ $message }}</div>@enderror

    <label for="bio">About me</label>
    <textarea id="bio" name="bio" placeholder="Write a few sentences about yourself.">{{ old('bio', $portfolio->bio) }}</textarea>
    @error('bio')<div class="error">{{ $message }}</div>@enderror

    <button type="submit" class="btn" style="margin-top:1.2rem">Save profile</button>
</form>
@endsection