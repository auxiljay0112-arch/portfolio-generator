<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --bg: #070b17; --panel: #0d1324; --card: rgba(255,255,255,.05); --line: rgba(255,255,255,.09); --text: #e8ecf5; --muted: #8d97b2; --blue: #2f6bff; --blue2: #7ba2ff; }
        * { box-sizing: border-box; }
        body { margin: 0; font-family: 'Plus Jakarta Sans', system-ui, -apple-system, 'Segoe UI', sans-serif; color: var(--text); background: radial-gradient(1100px 560px at 75% -10%, rgba(47,107,255,.2), transparent 60%), var(--bg); }
        a { color: inherit; text-decoration: none; }
        :focus-visible { outline: 2px solid var(--blue2); outline-offset: 2px; }

        .app { display: grid; grid-template-columns: 250px 1fr; min-height: 100vh; }
        .sidebar { position: sticky; top: 0; height: 100vh; padding: 1.2rem 1rem; background: var(--panel); border-right: 1px solid var(--line); display: flex; flex-direction: column; gap: .2rem; overflow-y: auto; }
        .brand { display: flex; align-items: center; gap: .6rem; font-weight: 700; font-size: 1.1rem; margin-bottom: 1rem; }
        .logo { width: 32px; height: 32px; border-radius: 10px; background: linear-gradient(135deg, var(--blue), #7c3aed); display: grid; place-items: center; font-size: .95rem; }
        .workspace { display: flex; align-items: center; gap: .7rem; padding: .7rem; border-radius: 14px; background: var(--card); border: 1px solid var(--line); margin-bottom: .6rem; }
        .avatar { width: 36px; height: 36px; border-radius: 50%; background: linear-gradient(135deg, #7c3aed, var(--blue)); display: grid; place-items: center; font-weight: 700; font-size: .85rem; flex: none; }
        .workspace strong { display: block; font-size: .9rem; }
        .workspace small { color: var(--muted); font-size: .78rem; word-break: break-word; }
        .nav-label { margin: .9rem .6rem .3rem; font-size: .68rem; letter-spacing: .14em; text-transform: uppercase; color: var(--muted); }
        .sidebar nav a { display: flex; align-items: center; gap: .7rem; padding: .62rem .75rem; border-radius: 10px; color: #b7c0d9; font-size: .92rem; }
        .sidebar nav a:hover { background: var(--card); color: #fff; }
        .sidebar nav a.active { background: rgba(47,107,255,.18); color: #fff; box-shadow: inset 0 0 0 1px rgba(123,162,255,.35); }
        .sidebar svg { width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; flex: none; }
        .promo { margin-top: auto; padding: 1rem; border-radius: 16px; background: linear-gradient(160deg, rgba(47,107,255,.35), rgba(124,58,237,.2)); border: 1px solid var(--line); }
        .promo strong { display: block; margin-bottom: .3rem; }
        .promo p { margin: 0; color: #c3cbe3; font-size: .82rem; }
        .logout { width: 100%; margin-top: .7rem; padding: .55rem; border-radius: 10px; border: 1px solid var(--line); background: transparent; color: var(--muted); cursor: pointer; font: inherit; font-size: .88rem; }
        .logout:hover { color: #fff; border-color: rgba(255,255,255,.25); }

        .main { min-width: 0; }
        .topbar { display: flex; align-items: center; justify-content: space-between; padding: 1rem 1.8rem; border-bottom: 1px solid var(--line); position: sticky; top: 0; background: rgba(7,11,23,.82); backdrop-filter: blur(10px); z-index: 5; }
        .topbar h2 { margin: 0; font-size: 1rem; font-weight: 600; }
        .actions { display: flex; align-items: center; gap: 1.2rem; }
        .actions .link { color: var(--muted); font-size: .9rem; }
        .actions .link:hover { color: #fff; }
        .content { padding: 1.8rem; max-width: 1120px; }
        .notice { margin-bottom: 1.2rem; padding: .8rem 1rem; border-radius: 12px; background: rgba(34,197,94,.12); border: 1px solid rgba(34,197,94,.3); color: #86efac; font-size: .9rem; }

        .btn { display: inline-block; text-align: center; padding: .62rem 1.1rem; border: 0; border-radius: 10px; background: linear-gradient(90deg, #2250e8, var(--blue)); color: #fff; font: inherit; font-weight: 600; font-size: .9rem; cursor: pointer; }
        .btn.ghost { background: var(--card); border: 1px solid var(--line); }
        .btn.danger { background: rgba(239,68,68,.14); color: #fca5a5; border: 1px solid rgba(239,68,68,.3); }
        .btn.light { background: #fff; color: #0b1020; }

        .eyebrow { font-size: .7rem; letter-spacing: .14em; text-transform: uppercase; color: var(--blue2); font-weight: 600; }
        .page-title { margin: .3rem 0; font-size: 2.1rem; letter-spacing: -.02em; }
        .page-sub { margin: 0 0 1.5rem; color: var(--muted); }
        .card { background: var(--card); border: 1px solid var(--line); border-radius: 18px; padding: 1.4rem; }
        .card h3 { margin: 0 0 .3rem; font-size: 1.05rem; }
        .card .sub { margin: 0 0 1rem; color: var(--muted); font-size: .9rem; }
        .grid { display: grid; gap: 1rem; }
        .cols-2 { grid-template-columns: repeat(2, 1fr); }
        .cols-3 { grid-template-columns: repeat(3, 1fr); }
        .cols-4 { grid-template-columns: repeat(4, 1fr); }

        label { display: block; margin: 1rem 0 .35rem; font-size: .85rem; font-weight: 600; color: #cfd6ea; }
        input[type=text], input[type=email], input[type=url], select, textarea { width: 100%; padding: .72rem .85rem; border-radius: 12px; border: 1px solid var(--line); background: rgba(255,255,255,.05); color: #fff; font: inherit; }
        select option { color: #000; }
        input:focus, select:focus, textarea:focus { outline: 2px solid var(--blue); border-color: transparent; }
        textarea { min-height: 130px; resize: vertical; }
        .error { color: #fca5a5; font-size: .82rem; margin-top: .3rem; }
        .addrow { display: flex; gap: 1rem; align-items: flex-end; flex-wrap: wrap; }
        .addrow > div { flex: 1; min-width: 160px; }

        .hero { display: grid; grid-template-columns: 1.1fr .9fr; gap: 1.5rem; padding: 2.4rem; border-radius: 24px; background: linear-gradient(135deg, #1d4ed8, #2f6bff 55%, #3b82f6); box-shadow: 0 20px 60px rgba(37,99,235,.35); overflow: hidden; }
        .hero .eyebrow { color: #cfe0ff; }
        .hero h1 { margin: .6rem 0 1rem; font-size: 2.9rem; line-height: 1.05; letter-spacing: -.03em; }
        .hero p { margin: 0 0 1.5rem; color: #dbe7ff; max-width: 38ch; }
        .mock { position: relative; min-height: 210px; }
        .mock .win { position: absolute; inset: 24px 8px 12px 40px; border-radius: 16px; background: rgba(255,255,255,.14); border: 1px solid rgba(255,255,255,.25); padding: 1rem; }
        .mock .bar { height: 10px; border-radius: 6px; background: rgba(255,255,255,.4); margin: .5rem 0; }
        .mock .tiles { display: grid; grid-template-columns: repeat(3, 1fr); gap: .5rem; margin-top: 1rem; }
        .mock .tiles i { height: 46px; border-radius: 10px; background: rgba(255,255,255,.25); }
        .chip { position: absolute; padding: .35rem .7rem; border-radius: 10px; background: #fff; color: #0b1020; font-size: .75rem; font-weight: 700; box-shadow: 0 8px 20px rgba(0,0,0,.25); }
        .chip.a { top: 0; left: 8px; }
        .chip.b { bottom: 0; left: 70px; }
        .code { position: absolute; right: 0; bottom: 24px; width: 36px; height: 36px; border-radius: 10px; background: #0b1020; display: grid; place-items: center; font-size: .8rem; font-weight: 700; }

        .stat { display: flex; flex-direction: column; gap: .3rem; }
        .stat small { color: var(--muted); }
        .stat .num { font-size: 1.9rem; font-weight: 800; letter-spacing: -.02em; }
        .progress { height: 8px; border-radius: 6px; background: rgba(255,255,255,.1); overflow: hidden; margin-top: .4rem; }
        .progress i { display: block; height: 100%; background: linear-gradient(90deg, #38bdf8, var(--blue2)); }
        .steps { list-style: none; margin: 0; padding: 0; display: grid; gap: .6rem; }
        .steps a { display: flex; align-items: center; gap: .7rem; padding: .7rem .85rem; border-radius: 12px; background: rgba(255,255,255,.04); }
        .steps a:hover { background: rgba(255,255,255,.08); }
        .tick { width: 20px; height: 20px; border-radius: 50%; border: 2px solid var(--muted); display: grid; place-items: center; font-size: .7rem; flex: none; }
        .tick.done { background: #22c55e; border-color: #22c55e; color: #04210f; }

        .tags { display: flex; flex-wrap: wrap; gap: .6rem; }
        .tag { display: inline-flex; align-items: center; gap: .5rem; padding: .45rem .8rem; border-radius: 10px; background: rgba(47,107,255,.16); border: 1px solid rgba(123,162,255,.3); font-size: .88rem; }
        .tag small { color: var(--muted); font-size: .72rem; }
        .tag form { display: inline; }
        .tag button { border: 0; background: transparent; color: #fca5a5; cursor: pointer; font-size: 1.05rem; padding: 0; line-height: 1; }
        .list { margin-top: 1rem; display: grid; gap: .8rem; }
        .item { display: flex; justify-content: space-between; gap: 1rem; padding: 1rem 1.1rem; border-radius: 14px; background: rgba(255,255,255,.04); border: 1px solid var(--line); }
        .item .meta { color: var(--muted); font-size: .85rem; }
        .item .desc { margin: .4rem 0; color: #c3cbe3; font-size: .92rem; }

        .tpl { border-radius: 18px; border: 1px solid var(--line); background: var(--card); padding: 1rem; }
        .tpl.selected { border-color: var(--blue2); box-shadow: 0 0 0 2px rgba(123,162,255,.3); }
        .thumb { height: 150px; border-radius: 12px; margin-bottom: .9rem; padding: .9rem; display: flex; flex-direction: column; gap: .5rem; }
        .thumb i { display: block; height: 10px; border-radius: 6px; background: rgba(255,255,255,.45); }
        .thumb .dot { width: 34px; height: 34px; border-radius: 50%; background: #c5cad6; }
        .thumb .boxes { display: grid; grid-template-columns: repeat(3, 1fr); gap: .4rem; margin-top: auto; }
        .thumb .boxes b { height: 38px; border-radius: 8px; background: rgba(255,255,255,.22); }
        .thumb.modern { background: linear-gradient(135deg, #1d4ed8, #3b82f6); }
        .thumb.minimal { background: #eef0f4; align-items: center; }
        .thumb.minimal i { background: #c5cad6; }
        .thumb.minimal .boxes { width: 100%; }
        .thumb.minimal .boxes b { background: #d9dde6; }
        .thumb.creative { background: linear-gradient(135deg, #1a1030 55%, #3b1550); }
        .thumb.creative i:first-child { height: 26px; width: 100% !important; background: linear-gradient(90deg, #ec4899, #f97316); }
        .tpl-foot { display: flex; align-items: center; justify-content: space-between; gap: .8rem; }
        .tpl-foot small { display: block; color: var(--muted); font-size: .8rem; }
        .frame iframe { width: 100%; height: 75vh; border: 1px solid var(--line); border-radius: 18px; background: #fff; }

        @media (max-width: 900px) {
            .app { grid-template-columns: 1fr; }
            .sidebar { position: static; height: auto; }
            .hero { grid-template-columns: 1fr; }
            .cols-4, .cols-3, .cols-2 { grid-template-columns: 1fr 1fr; }
            .content, .topbar { padding-left: 1rem; padding-right: 1rem; }
        }
        @media (max-width: 560px) {
            .cols-4, .cols-3, .cols-2 { grid-template-columns: 1fr; }
            .hero h1 { font-size: 2.2rem; }
        }
    </style>
</head>
<body>
@php
    $user = auth()->user();
    $initials = collect(explode(' ', trim($user->name)))->filter()->map(fn ($w) => mb_strtoupper(mb_substr($w, 0, 1)))->take(2)->implode('');

    $nav = [
        ['href' => '/dashboard', 'match' => 'dashboard', 'label' => 'Dashboard', 'icon' => '<rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>'],
        ['href' => '/profile', 'match' => 'profile', 'label' => 'My Profile', 'icon' => '<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>'],
        ['href' => '/projects', 'match' => 'projects', 'label' => 'My Projects', 'icon' => '<path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>'],
        ['href' => '/skills', 'match' => 'skills', 'label' => 'Skills', 'icon' => '<polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>'],
        ['href' => '/education', 'match' => 'education', 'label' => 'Education', 'icon' => '<path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>'],
        ['href' => '/templates', 'match' => 'templates', 'label' => 'Templates', 'icon' => '<rect x="3" y="3" width="18" height="18" rx="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/>'],
    ];

    $nav2 = [
        ['href' => '/preview', 'match' => 'preview', 'label' => 'Live Preview', 'icon' => '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>'],
        ['href' => '/publish', 'match' => 'publish', 'label' => 'Publish / Export', 'icon' => '<path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><polyline points="16 6 12 2 8 6"/><line x1="12" y1="2" x2="12" y2="15"/>'],
    ];
@endphp
<div class="app">
    <aside class="sidebar">
        <div class="brand"><span class="logo">P</span> Portfolio</div>

        <div class="workspace">
            <span class="avatar">{{ $initials }}</span>
            <div>
                <strong>Student Workspace</strong>
                <small>{{ $user->name }}</small>
            </div>
        </div>

        <div class="nav-label">Workspace</div>
        <nav>
            @foreach ($nav as $item)
                <a href="{{ $item['href'] }}" class="{{ request()->is($item['match']) ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" aria-hidden="true">{!! $item['icon'] !!}</svg>{{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        <div class="nav-label">Portfolio</div>
        <nav>
            @foreach ($nav2 as $item)
                <a href="{{ $item['href'] }}" class="{{ request()->is($item['match'] . '*') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" aria-hidden="true">{!! $item['icon'] !!}</svg>{{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        <div class="promo">
            <strong>Build your future.</strong>
            <p>Showcase your skills and projects in one place.</p>
        </div>

        <form method="POST" action="/logout">
            @csrf
            <button type="submit" class="logout">Log out</button>
        </form>
    </aside>

    <main class="main">
        <header class="topbar">
            <h2>@yield('title')</h2>
            <div class="actions">
                <a href="/preview/frame" target="_blank" class="link">Preview &#8599;</a>
                <a href="/publish" class="btn">Publish / Export</a>
            </div>
        </header>

        <div class="content">
            @if (session('status'))
                <div class="notice">{{ session('status') }}</div>
            @endif

            @yield('content')
        </div>
    </main>
</div>
</body>
</html>