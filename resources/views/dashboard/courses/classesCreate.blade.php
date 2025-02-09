@extends('layouts.dashLayouts')

@section('title', 'Code & Lens - Create Class')

@section('content')

<link rel="stylesheet" href="{{asset('sass/classes/create/create.css')}}">
<div class="formWrapper">
    <h2 class="titleCreate">{{__('Create Class')}}</h2>
    <a class="btnBack" href="{{route('admin')}}"><i class="fa-solid fa-arrow-rotate-left"></i></a>
    <form 
        action="{{route('classes.index')}}" 
        method="POST" class="formCreate"
    >
        @csrf

        <label class="formLabel" for="course_id">{{ __('Course') }}:</label>
        <select class="formInput" id="course_id" name="course_id" required>
            <option value="">{{ __('Select a course') }}</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
        </select>

        
        <label class="formLabel" for="title">{{__('Title')}}:</label>
        
        <input class="formInput" type="text" id="title" name="title" >
    
        <label class="formLabel" for="date">{{__('Date')}}:</label>

        <input class="formInput" type="date" id="date" name="date" >

        <label class="formLabel" for="start_time">{{__('Start Time')}}:</label>

        <input class="formInput" type="time" id="start_time" name="start_time" >

        <label class="formLabel" for="pdf">{{__('PDF')}}:</label>

        <input class="formInput" type="text" id="pdf" name="pdf" >

        <label  class="formLabel" for="powerpoint">{{__('Powerpoint')}}:</label>

        <input class="formInput" type="text" id="powerpoint" name="powerpoint" >

        <label class="formLabel" for="video">{{__('Video')}}:</label>

        <input class="formInput" type="text" id="video" name="video" >

        <label class="formLabel" for="meet_link">{{__('Meet Link')}}:</label>

        <input  class="formInput" type="text" id="meet_link" name="meet_link" >


        <button class="formButton" type="submit">{{__('Create')}}</button>
    
    </form> 
</div>

@endsection