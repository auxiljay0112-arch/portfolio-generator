@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<section class="hero">
    <div>
        <div class="eyebrow">&#10022; Your next opportunity starts here</div>
        <h1>Show the world what you can do.</h1>
        <p>Create a portfolio that presents your work, tells your story, and highlights your potential as an IT student.</p>
        <a href="/preview" class="btn light">View My Portfolio &rarr;</a>
    </div>
    <div class="mock" aria-hidden="true">
        <span class="chip a">Creative</span>
        <div class="win">
            <div class="bar" style="width:70%"></div>
            <div class="bar" style="width:45%"></div>
            <div class="tiles"><i></i><i></i><i></i></div>
        </div>
        <span class="chip b">Developer</span>
        <span class="code">&lt;/&gt;</span>
    </div>
</section>

<div class="grid cols-4" style="margin-top:1rem">
    <div class="card stat">
        <small>Profile completion</small>
        <span class="num">{{ $stats['completion'] }}%</span>
        <div class="progress"><i style="width: {{ $stats['completion'] }}%"></i></div>
    </div>
    <div class="card stat">
        <small>Projects added</small>
        <span class="num">{{ $stats['projects'] }}</span>
        <small>Showcase your best work</small>
    </div>
    <div class="card stat">
        <small>Skills listed</small>
        <span class="num">{{ $stats['skills'] }}</span>
        <small>Highlight your abilities</small>
    </div>
    <div class="card stat">
        <small>Current template</small>
        <span class="num">{{ ucfirst($portfolio->template) }}</span>
        <a href="/templates" style="color:var(--blue2);font-size:.85rem">Change your design anytime</a>
    </div>
</div>

<div class="grid cols-2" style="margin-top:1rem">
    <div class="card">
        <h3>Get started</h3>
        <p class="sub">Complete these steps to prepare your portfolio.</p>
        <ul class="steps">
            @foreach ($steps as $step)
                <li>
                    <a href="{{ $step['url'] }}">
                        <span class="tick {{ $step['done'] ? 'done' : '' }}">{{ $step['done'] ? '✓' : '' }}</span>
                        {{ $step['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="card">
        <h3>Quick actions</h3>
        <p class="sub">Manage your portfolio faster.</p>
        <div class="grid cols-2">
            <a class="btn ghost" href="/projects">+ Add project</a>
            <a class="btn ghost" href="/skills">+ Add skill</a>
            <a class="btn ghost" href="/education">+ Add education</a>
            <a class="btn ghost" href="/templates">Change template</a>
        </div>
    </div>
</div>
@endsection