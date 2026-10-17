@extends('layouts.app')
@section('title', 'Live Preview')
@section('content')
<div class="eyebrow">Your portfolio</div>
<h1 class="page-title">Live Preview</h1>
<p class="page-sub">This is how your portfolio looks with the <strong>{{ ucfirst($portfolio->template) }}</strong> template. <a href="/templates" style="color:var(--blue2)">Change template</a></p>

<div class="frame">
    <iframe src="/preview/frame" title="Portfolio preview"></iframe>
</div>
@endsection