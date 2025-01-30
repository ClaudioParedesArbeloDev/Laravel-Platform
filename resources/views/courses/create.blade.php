@extends('layouts.app')

@section('title', 'Code & Lens - Create Course')

@section('content')

<link rel="stylesheet" href="{{asset('sass/courses/create/create.css')}}">
<div class="formWrapper">
<h2 class="titleCreate">{{__('Create Course')}}</h2>
<form action="{{route('courses.index')}}" method="POST" class="formCreate">
    @csrf
    <label class="formLabel" for="name">{{__('Title')}}:</label>
        
    <input class="formInput" type="text" id="name" name="name" >
    
    <label class="formLabel" for="description">{{__('Description')}}:</label>
    
    <input class="formInput" type="text"  id="description" name="description" >

    <label class="formLabel" for="image">{{__('Image')}}:</label>
    
    <input class="formInput" type="text" id="image" name="image" >

    <label class="formLabel" for="price">{{__('Price')}}:</label>
    
    <input class="formInput" type="text" id="price" name="price" >

    <label class="formLabel" for="days">{{__('Days')}}:</label>

    <input class="formInput" type="text" id="days" name="days" >

    <label class="formLabel" for="schedule">{{__('Schedule')}}:</label>

    <input class="formInput" type="text" id="schedule" name="schedule" >

    <label class="formLabel" for="duration">{{__('Duration')}}:</label>

    <input class="formInput" type="text" id="duration" name="duration" >

    <label class="formLabel" for="category">{{__('Category')}}:</label>

    <input class="formInput" type="text"  id="category" name="category" >

    <label class="formLabel" for="active">{{__('Active')}}:</label>
    
    <input type="checkbox" id="active" name="active" value="1" checked>


    <label class="formLabel" for="instructor">{{__('Instructor')}}:</label>

    <select class="formInput" id="user_id" name="user_id" required>
    <option value="">{{__('Select an instructor')}}</option>
    @foreach($users as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
    @endforeach
    </select>
        
    <button class="formButton" type="submit">{{__('Create')}}</button>
</form>
</div>

@endsection