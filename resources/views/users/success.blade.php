@extends('layouts.app')

@section('title', 'Code & Lens - Contact')

@section('content')
    <link rel="stylesheet" href="{{asset('sass/users/success/success.css')}}">
    <div class="success">
        <h2>{{__('Registration successful!')}}</h2>
        <h3>{{__('Welcome to Code & Lens!!!')}}</h3>
    </div>
    <script>
        setTimeout(() => {
            window.location.href = "{{ route('login') }}";
        }, 3000);
    </script>
@endsection