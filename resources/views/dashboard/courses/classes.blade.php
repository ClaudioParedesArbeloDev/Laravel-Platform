@extends('layouts.dashLayouts')

@section('title', 'Code & Lens - Dashboard')

@section('content')
    <link rel="stylesheet" href="{{asset('sass/classes/classes/classes.css') }}">
    <div class="container">
        <h2>{{$course->name}}</h2>

        <table>
            <thead>
                <tr>
                    <th>{{__('Date')}}</th>
                    <th>{{__('Start Time')}}</th>
                    <th>{{__('Title')}}</th>
                    <th>{{__('PDF')}}</th>
                    <th>{{__('PPT')}}</th>
                    <th>{{__('Video')}}</th>
                    <th>{{__('Meet')}}</th>
                    <th>{{__('Homework')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($course->classes as $class)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($class->date)->translatedFormat('j \d\e F') }}</td>
                    <td>{{ \Carbon\Carbon::parse($class->start_time)->format('H:i')}}</td>
                    <td>{{$class->title}}</td>
                    @if ($class->pdf != null)
                    <td><a href="{{$class->pdf}}">PDF</a></td>  
                    @else
                    <td>Empty</td>  
                    @endif
                    @if ($class->powerpoint != null)
                    <td><a href="{{$class->powerpoint}}">PPT</a></td>
                    @else
                        <td>Empty</td>
                    @endif
                    @if ($class->video != null)
                    <td><a href="{{$class->video}}">Video</a></td>
                    @else
                    <td>Empty</td>
                    @endif
                    
                    <td>{{$class->meet_link}}</td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection