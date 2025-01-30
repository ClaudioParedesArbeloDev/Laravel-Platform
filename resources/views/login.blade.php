@extends('layouts.app')

@section('title', 'Code & Lens - Login')



@section('content')
    <link rel="stylesheet" href="{{asset('sass/login/login.css') }}">

    <div class="loginContainer">
        <h2 class="loginTitle">{{__('Login')}}</h2>
        
        <form action="{{route('login')}}" method="POST">
            @csrf
            <div class="loginForm">
                <label for="email">{{__('Email')}}:</label>
                <input type="email" id="email" name="email" required>
                <label for="password">{{__('Password')}}:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Login</button>
            </div>
        </form>
        <a href="{{route('register')}}" class="signup">{{__('Don\'t have an account? Sign up here!')}}</a>

    </div>

@endsection
