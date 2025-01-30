@extends('layouts.app')

@section('title', 'Code & Lens - Courses')



@section('content')

<link rel="stylesheet" href="{{ asset('sass/courses/index.css') }}">
<div class="coursesContainer">
    <h2 class="coursesListTitle">{{__('Courses')}}</h2>
    <table>
        <thead>
            <tr class="coursesTableHeader">
                <th>{{__('Title')}}</th>
                <th>{{__('Category')}}</th>
                <th>{{__('Active')}}</th>
                <th>{{__('Instructor')}}</th>
                <th>{{__('Edit')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
            <tr>
                <td>{{ $course->name }}</td>
                <td>{{ $course->category }}</td>
                <td>{{ $course->active }}</td>
                <td>{{ $course->user ? $course->user->name : 'Desconocido' }}</td>
                <td><a href="/courses/{{$course->id}}">{{__('Edit')}}</a></td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection