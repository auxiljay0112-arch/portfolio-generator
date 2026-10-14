<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create your portfolio</title>
    <style>
        body { font-family: system-ui, sans-serif; background: #f4f4f5; margin: 0; padding: 2rem 1rem; }
        .card { max-width: 520px; margin: 0 auto; background: #fff; padding: 2rem; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,.08); }
        h1 { margin-top: 0; }
        label { display: block; margin: 1rem 0 .3rem; font-weight: 600; }
        input, textarea { width: 100%; padding: .6rem; border: 1px solid #d4d4d8; border-radius: 8px; font: inherit; box-sizing: border-box; }
        button { margin-top: 1.5rem; width: 100%; padding: .8rem; background: #111; color: #fff; border: 0; border-radius: 8px; font: inherit; cursor: pointer; }
        .error { color: #b91c1c; font-size: .9rem; margin-top: .3rem; }
        .hint { color: #71717a; font-size: .85rem; }
    </style>
</head>
<body>
<div class="card">
    <h1>Create your portfolio</h1>
    <form method="POST" action="/portfolios">
        @csrf

        <label for="name">Name</label>
        <input id="name" name="name" value="{{ old('name') }}" required>
        @error('name')<div class="error">{{ $message }}</div>@enderror

        <label for="title">Title</label>
        <input id="title" name="title" value="{{ old('title') }}" placeholder="e.g. Web Developer">
        @error('title')<div class="error">{{ $message }}</div>@enderror

        <label for="bio">About you</label>
        <textarea id="bio" name="bio" rows="4">{{ old('bio') }}</textarea>
        @error('bio')<div class="error">{{ $message }}</div>@enderror

        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}">
        @error('email')<div class="error">{{ $message }}</div>@enderror

        <label for="skills">Skills</label>
        <input id="skills" name="skills" value="{{ old('skills') }}" placeholder="PHP, Laravel, CSS">
        <div class="hint">Separate skills with commas.</div>
        @error('skills')<div class="error">{{ $message }}</div>@enderror

        <button type="submit">Create portfolio</button>
    </form>
</div>
</body>
</html>