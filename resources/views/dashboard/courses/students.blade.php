@extends('layouts.dashLayouts')

@section('title', 'Code & Lens - Students')

@section('content')

<link rel="stylesheet" href="{{ asset('sass/dashboard/cursos/students/students.css') }}">

<div class="container">
    <h2>{{$course->name}}</h2> 
        <div class="studentsWrapper">
            @foreach ($course->students as $student)
            <div class="cardwrapper">
                <p class="lastname">{{$student->lastname}}</p>
                <p class= 'name'>{{$student->name}}</p>
                <form action="{{ route('courses.updateStatus', [$course->id, $student->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label class="statusLabel" for="status_{{ $student->id }}">{{ __('Status') }}</label>
                    <select name="status" id="status_{{ $student->id }}">
                        <option value="inprogress" {{ $student->pivot->status == 'inprogress' ? 'selected' : '' }}>{{ __('In Progress') }}</option>
                        <option value="completed" {{ $student->pivot->status == 'completed' ? 'selected' : '' }}>{{ __('Completed') }}</option>
                    </select>
                    <button type="submit" class="btnUpdateStatus">{{ __('Update Status') }}</button>
                </form>
            </div>
            @endforeach
        </div> 
</div>

@endsection
