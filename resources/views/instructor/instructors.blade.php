@extends('layouts.app')

@section('title', 'Code & Lens - Instructors')



@section('content')

    <link rel="stylesheet" href="{{ asset('sass/instructors/index.css') }}">
    <div class="blogsContainer">
        <h2 class="news">{{ __("Instructors") }}</h2>
        <table>
            <thead>
                <tr class= 'instructorTableHeader'>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Surname')}}</th>
                    <th>{{__('Edit')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($instructors as $instructor)
                    <tr class='instructorTableRow'>
                        <td>{{$instructor->name}}</td>
                        <td>{{$instructor->surname}}</td>
                        <td = 'celdaEdit'><a href="/instructors/{{$instructor->id}}"><i class="fa-solid fa-user-pen"></i></a></td>
                    </tr>
                @endforeach
        </table>
        
    
        
    </div> 
    

@endsection
