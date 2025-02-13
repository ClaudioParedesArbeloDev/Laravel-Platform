@extends('layouts.app')

@section('title', 'Code & Lens')

@section('content')

    <link rel="stylesheet" href="{{asset('sass/home/home.css') }}">
    <div class="homeContainer">
        <h1>Aprende Programación, Fotografía y Video</h1>
        
        <div class="courseWrapper">
            @foreach ($courses as $course)
                <div class="courses" style="display: none;">
                    <div class="course">
                        <p>Categoria: {{$course->category}}</p>
                        <h2>{{$course->name}}</h2>
                        <p>{{$course->description}}</p>
                        <p>{{ __('Price') }}: {{ $course->price == 0.00 ? 'Free' : 'u$s' . number_format($course->price, 2) }}</p>
                        <p>Duración: {{$course->duration}}</p>
                        @if ($course->image != null)
                            <img src="{{ asset('storage/courses/'.$course->image) }}" alt="courseImage">    
                        @endif
                        <a href="{{route('cursos.detail', $course->id)}}" 
                            class="btnCourse"
                            data-tooltip="{{ __('Invest in your future!') }}">
                            <span>{{__('More Info')}}</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>        
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let courses = document.querySelectorAll(".courses");
            let currentIndex = 0;

            function showNextCourse() {
                // Ocultar todos los cursos
                courses.forEach(course => course.style.display = "none");
                
                // Mostrar el curso actual
                courses[currentIndex].style.display = "block";

                // Mover al siguiente curso (o reiniciar si llega al final)
                currentIndex = (currentIndex + 1) % courses.length;
            }

            // Mostrar el primer curso inmediatamente
            showNextCourse();

            // Cambiar cada 5 segundos
            setInterval(showNextCourse, 5000);
        });
    </script>

@endsection

