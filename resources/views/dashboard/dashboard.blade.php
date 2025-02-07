@extends('layouts.dashLayouts')

@section('title', 'Code & Lens - Dashboard')

@section('content')
    <link rel="stylesheet" href="{{asset('sass/dashboard/index.css') }}">
    <div class="dashboardWrapper">
        <h1>Dashboard</h1>
        <p>Hola {{ Auth::user()->name }}</p>
        <p>@foreach (Auth::user()->courses as $course)
            <h2>{{ $course->name }}</h2>
            <p>{{ $course->enroll_day }}</p>

            
        @endforeach</p>
        
    </div>

@endsection