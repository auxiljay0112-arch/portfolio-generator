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
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 1.5rem; font-family: 'Plus Jakarta Sans', system-ui, sans-serif; color: #e8ecf5; background: radial-gradient(900px 500px at 20% 0%, rgba(47,107,255,.35), transparent 60%), #070b17; }
        .card { width: 100%; max-width: 420px; background: rgba(255,255,255,.05); border: 1px solid rgba(255,255,255,.1); border-radius: 20px; padding: 2rem; backdrop-filter: blur(10px); }
        .brand { display: flex; align-items: center; gap: .6rem; font-weight: 700; font-size: 1.1rem; margin-bottom: 1.4rem; }
        .logo { width: 32px; height: 32px; border-radius: 10px; background: linear-gradient(135deg, #2f6bff, #7c3aed); display: grid; place-items: center; font-size: .95rem; }
        h1 { margin: 0 0 .3rem; font-size: 1.8rem; color: #fff; letter-spacing: -.02em; }
        .sub { margin: 0 0 1.2rem; color: #8d97b2; }
        label { display: block; margin: 1rem 0 .35rem; font-weight: 600; font-size: .85rem; color: #cfd6ea; }
        input[type=text], input[type=email], input[type=password] { width: 100%; padding: .75rem .85rem; border-radius: 12px; border: 1px solid rgba(255,255,255,.12); background: rgba(255,255,255,.05); color: #fff; font: inherit; }
        input:focus { outline: 2px solid #3b82f6; border-color: transparent; }
        .row { display: flex; align-items: center; gap: .5rem; margin-top: 1rem; font-size: .9rem; }
        button { width: 100%; margin-top: 1.4rem; padding: .85rem; border: 0; border-radius: 12px; background: linear-gradient(90deg, #2250e8, #2f6bff); color: #fff; font: inherit; font-weight: 700; cursor: pointer; }
        .error { color: #fca5a5; font-size: .85rem; margin-top: .3rem; }
        .alt { margin-top: 1.2rem; text-align: center; color: #8d97b2; font-size: .9rem; }
        .alt a { color: #7ba2ff; text-decoration: none; font-weight: 600; }
    </style>
</head>
<body>
<div class="card">
    <div class="brand"><span class="logo">P</span> Portfolio</div>
    @yield('content')
</div>
</body>
</html>