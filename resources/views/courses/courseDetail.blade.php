@extends('layouts.app')

@section('title', 'Code & Lens - Contact')

@section('content')

    <link rel="stylesheet" href="{{asset('sass/cursos/detalle/detail.css')}}">
    <div class="container">
        
        <div class="courseDetail">
            <h3>{{$course->category}}</h3>
            <h1>{{$course->name}}</h1>
            <p>{{$course->description}}</p>
            <p>Duración: {{$course->duration}}</p>
            <p>Dias: 
                @if (empty($course->days2))
                    <span>{{$course->days1}}</span>
                @else
                <select name="days" id="days">
                    <option value="" disabled selected>Seleccione horario</option>
                    <option value="1">{{ $course->days1 }}</option>
                    <option value="2">{{ $course->days2 }}</option>
                </select>
                
                @endif
            </p>
            <p>{{ __('Price') }}: {{ $course->price == 0.00 ? 'Free' : 'u$s' . number_format($course->price, 2) }}</p>

           
        @if (Auth::check())
            <form action="{{route('courses.enroll')}}" method="POST">
            @csrf
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <input type="hidden" name="course_id" value="{{$course->id}}">
                <input type="hidden" id="hidden_enroll_day" name="enroll_day">
                <button type="submit" class="btnEnroll">{{__('Enroll')}}</button>
            </form>
        @else
            <a href="{{ route('login') }}?redirect={{ urlencode(url()->current()) }}" class="btnEnroll" id="loginBtn">{{__('Login to Enroll')}}</a>
            <p>{{__('Don\'t have an account?'  )}}  <a href="{{route('users.create')}}?redirect={{ urlencode(url()->current()) }}">{{__('Sign up here!!!')}}</a></p>
        @endif 
        </div>
        <img src="{{asset('storage/courses/'.$course->image)}}" alt="">

    </div>
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: '{{ session('error') }}',
                confirmButtonText: 'Cerrar'
            });
        </script>
    @endif
   
    <script src="{{asset('js/enroll.js')}}"></script>
@endsection