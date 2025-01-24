@extends('layouts.app')

@section('title', 'Code & Lens - Login')



@section('content')
    <link rel="stylesheet" href="{{asset('sass/login/login.css') }}">

    <div class="loginContainer">
        <h2 class="loginTitle">Login</h2>
        <form action="{{route('login')}}" method="POST">
            @csrf
            <div class="loginForm">
                <label for="username">UserName:</label>
                <input type="text" id="username" name="username">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Login</button>
            </div>
        </form>
        <a href="{{route('login')}}" class="signup">Don't have an account? Sign up here!</a>

    </div>

@endsection
