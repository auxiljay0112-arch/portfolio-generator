<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $portfolio->name }}@if ($portfolio->title) - {{ $portfolio->title }}@endif</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: var(--font); background: var(--bg); color: var(--text); line-height: 1.6; }
        .wrap { max-width: 920px; margin: 0 auto; padding: 0 1.5rem; }
        .hero { background: var(--hero-bg); padding: 4rem 0; }
        .hero-inner { display: flex; align-items: center; gap: 2rem; flex-wrap: wrap; }
        .photo { width: 140px; height: 140px; border-radius: 50%; object-fit: cover; flex: none; border: 4px solid var(--ring); }
        .initials { display: grid; place-items: center; font-size: 3rem; font-weight: 700; background: var(--accent); color: #fff; }
        h1 { margin: 0; font-size: clamp(2rem, 5vw, 3rem); line-height: 1.1; color: var(--hero-text); }
        .role { margin: .4rem 0 0; font-size: 1.2rem; color: var(--hero-muted); }
        .loc { margin: .2rem 0 0; color: var(--hero-muted); }
        .cta { display: inline-block; margin-top: 1.2rem; padding: .7rem 1.4rem; border-radius: 999px; background: var(--accent); color: #fff; text-decoration: none; font-weight: 600; }
        main { padding: 1rem 0 3rem; }
        section { margin-top: 2.5rem; }
        h2 { margin: 0 0 1rem; font-size: 1.4rem; color: var(--heading); }
        h3 { margin: 0 0 .4rem; font-size: 1.05rem; color: var(--heading); }
        .bio { white-space: pre-line; color: var(--muted); max-width: 70ch; }
        .group { margin-bottom: 1rem; }
        .group h3 { font-size: .85rem; color: var(--muted); font-weight: 600; }
        .tags { display: flex; flex-wrap: wrap; gap: .5rem; }
        .tag { padding: .3rem .8rem; border-radius: 999px; background: var(--tag-bg); color: var(--tag-text); font-size: .88rem; }
        .cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1rem; }
        .pcard { padding: 1.3rem; border-radius: var(--radius); background: var(--card); border: 1px solid var(--line); }
        .pcard p { margin: .3rem 0 .8rem; color: var(--muted); }
        .more { display: inline-block; margin-top: .8rem; color: var(--accent); text-decoration: none; font-weight: 600; }
        .timeline { border-left: 2px solid var(--line); padding-left: 1.2rem; }
        .entry { margin-bottom: 1.2rem; }
        .entry small { color: var(--muted); }
        .foot { padding: 2rem; text-align: center; color: var(--muted); font-size: .85rem; }
    </style>
    <style>
        @yield('theme')
    </style>
</head>
<body class="{{ $portfolio->template }}">
@include('templates.content')
</body>
</html>