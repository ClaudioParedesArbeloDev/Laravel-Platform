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
                <input type="email" id="email" name="email" required class="inputLogin">

                <label for="password">{{__('Password')}}:</label>
                <input type="password" id="password" name="password" required class="inputLogin">

                <div class='checkRemember'>
                <input type="checkbox" id="remember" name="remember" class="rememberMe">
                <label for="remember">{{__('Remember me')}}</label>
                </div>

                <a href="{{route('password.request')}}">{{__('Forgot password?')}}</a>

                <input type="hidden" name="redirect" value="{{ request()->get('redirect', route('dashboard')) }}">
                
                

                <button type="submit">{{__('Login')}}</button>
            </div>
        </form>
        @if ($errors->any())
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: `{!! implode('<br>', $errors->all()) !!}`,
                });
            </script>
        @endif
        

    </div>

@endsection
