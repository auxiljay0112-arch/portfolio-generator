@extends('layouts.auth')
@section('title', 'Create account')
@section('content')
    <h1>Create your account</h1>
    <p class="sub">Start building your portfolio.</p>
    <form method="POST" action="/register">
        @csrf
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
        @error('name')<div class="error">{{ $message }}</div>@enderror

        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        @error('email')<div class="error">{{ $message }}</div>@enderror

        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
        @error('password')<div class="error">{{ $message }}</div>@enderror

        <label for="password_confirmation">Confirm password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>

        <button type="submit">Create account</button>
    </form>
    <div class="alt">Already have an account? <a href="/login">Log in</a></div>
@endsection