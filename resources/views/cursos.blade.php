@extends('layouts.app')

@section('title', 'Code & Lens - Courses')

@section('content')

<link rel="stylesheet" href="{{asset('sass/cursos/cursos.css')}}">

<div class="container">
    @foreach ($coursesByCategory as $category => $courses)
        <div class="coursesWrapper">   
            <div class="cardwrapper">
                @foreach ($courses as $course)
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $course->category }}</h4>
                        </div>
                        <div class="card-body">
                            <h5>{{ $course->name }}</h5>
                            <p>Duración: {{$course->duration}}</p>
                            <p>{{ __('Price') }}: {{ $course->price == 0.00 ? 'Free' : 'u$s' . number_format($course->price, 2) }}</p>
                            <a href="{{route('cursos.detail', $course->id)}}" 
                                class="btnCourse"
                                data-tooltip="{{ __('Invest in your future!') }}"
                                >
                                <span>{{__('More Info')}}</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>

@endsection