@extends('layouts.dashLayouts')

@section('title', 'Code & Lens - Dashboard')

@section('content')
    <link rel="stylesheet" href="{{asset('sass/dashboard/index.css') }}">
    <div class="dashboardWrapper">
        
        <p class="welcome">Hola {{ Auth::user()->name }}</p>
        <h3>{{__('Your courses')}}</h3>
        <div class="coursesContainer">@foreach (Auth::user()->courses as $course)
            <div class="coursesWrapper">
                <div class="courseText">
                    <p>{{ $course->category}}</p>
                    <h2>{{ $course->name }}</h2>
                </div>
                <a href="{{route('cursos.class', $course->id)}}" class="btnCourse">{{__('Access the course')}}</a>
            </div>
            
            

            
            @endforeach
        </div>
        
    </div>

@endsection