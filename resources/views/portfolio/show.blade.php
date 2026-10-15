<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $portfolio->name }}</title>
    <style>
        body { font-family: system-ui, sans-serif; background: #111; color: #fff; margin: 0; padding: 3rem 1rem; }
        .wrap { max-width: 640px; margin: 0 auto; }
        h1 { font-size: 2.5rem; margin: 0; }
        .title { color: #a1a1aa; font-size: 1.2rem; margin: .3rem 0 1.5rem; }
        p { line-height: 1.6; color: #e4e4e7; white-space: pre-line; }
        .skills { display: flex; flex-wrap: wrap; gap: .5rem; margin: 1.5rem 0; }
        .skill { background: #27272a; padding: .4rem .9rem; border-radius: 999px; font-size: .9rem; }
        a.btn { display: inline-block; background: #fff; color: #111; padding: .7rem 1.4rem; border-radius: 8px; text-decoration: none; font-weight: 600; }
    </style>
</head>
<body>
<div class="wrap">
    <h1>{{ $portfolio->name }}</h1>
    @if($portfolio->title)
        <div class="title">{{ $portfolio->title }}</div>
    @endif

    @if($portfolio->bio)
        <p>{{ $portfolio->bio }}</p>
    @endif

    @if(count($skills))
        <div class="skills">
            @foreach($skills as $skill)
                <span class="skill">{{ $skill }}</span>
            @endforeach
        </div>
    @endif

    @if($portfolio->email)
        <a class="btn" href="mailto:{{ $portfolio->email }}">Contact me</a>
    @endif
</div>
</body>
</html>