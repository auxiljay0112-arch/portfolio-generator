@extends('layouts.app')
@section('title', 'Templates')
@section('content')
<div class="eyebrow">Design your portfolio</div>
<h1 class="page-title">Choose a Template</h1>
<p class="page-sub">Select a style. Your profile and projects will appear in that design.</p>

@php
    $templates = [
        'modern' => ['Modern', 'Bold, clean, and professional'],
        'minimal' => ['Minimal', 'Simple and elegant'],
        'creative' => ['Creative', 'Colorful and expressive'],
    ];
@endphp

<div class="grid cols-3">
    @foreach ($templates as $key => $info)
        <div class="tpl {{ $portfolio->template === $key ? 'selected' : '' }}">
            <div class="thumb {{ $key }}" aria-hidden="true">
                @if ($key === 'minimal')<span class="dot"></span>@endif
                <i style="width:55%"></i>
                <i style="width:35%"></i>
                <div class="boxes"><b></b><b></b><b></b></div>
            </div>
            <div class="tpl-foot">
                <div>
                    <strong>{{ $info[0] }}</strong>
                    <small>{{ $info[1] }}</small>
                </div>
                <form method="POST" action="/templates">
                    @csrf
                    <input type="hidden" name="template" value="{{ $key }}">
                    <button type="submit" class="btn {{ $portfolio->template === $key ? '' : 'ghost' }}">
                        {{ $portfolio->template === $key ? '✓ Selected' : 'Use Template' }}
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>

<p style="margin-top:1.4rem"><a href="/preview" class="btn ghost">See live preview &rarr;</a></p>
@endsection