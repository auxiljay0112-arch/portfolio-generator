@extends('layouts.auth')
@section('title', 'Log in')
@section('content')
    <h1>Welcome back</h1>
    <p class="sub">Log in to your workspace.</p>
    <form method="POST" action="/login">
        @csrf
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        @error('email')<div class="error">{{ $message }}</div>@enderror

        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>

        <div class="row">
            <input id="remember" type="checkbox" name="remember" value="1">
            <label for="remember" style="margin:0;font-weight:400">Remember me</label>
        </div>

        <button type="submit">Log in</button>
    </form>
    <div class="alt">No account yet? <a href="/register">Create one</a></div>
@endsection