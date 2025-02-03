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
            <p>Dias: {{$course->days}}</p>
            <p>Horario: {{$course->schedule}}</p>
            <p>Precio: {{$course->price}}</p>
            <a href="" class="btnEnroll">{{__('Enroll')}}</a>
        </div>
        <img src="{{$course->image}}" alt="Imagen del curso">

    </div>


@endsection