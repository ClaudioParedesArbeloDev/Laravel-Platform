@extends('layouts.app')

@section('title', 'Code & Lens - Create Instructor')
    


@section('content')

<link rel="stylesheet" href="{{asset('sass/instructors/create/create.css') }}">
<div class="formWrapper">
<h2 class="titleCreate">{{__('Create Instructor')}}</h2>
<form action="{{route('instructors.index')}}" method="POST" enctype="multipart/form-data" class="formCreate">
    @csrf
    <label class="formLabel" for="name">{{__('Name')}}:</label>
        
    <input class="formInput" type="text" id="name" name="name" >
    
    <label  class="formLabel" for="surname">{{__('Surname')}}:</label>
    
    <input class="formInput" type="text" id="surname" name="surname" >
    
    <label  class="formLabel" for="email">{{__('Email')}}:</label>

    <input class="formInput" type="text" id="email" name="email" >

    <label  class="formLabel" for="phone">{{__('Phone')}}:</label>

    <input class="formInput" type="text" id="phone" name="phone" >

    <label  class="formLabel" for="bio">{{__('Bio')}}:</label>

    <textarea class="formText" rows="10" type="text-area" id="bio" name="bio" ></textarea>

    <label class="formLabelAvatar" for="avatar" ><img src="{{asset('images/avatars/avatar.png')}}" alt="avatar"></label>

    <input class="formInputfile" type="file" id="avatar" name="avatar" >
        
    <button class="formButton" type="submit">{{__('Create')}}</button>
</form>
</div>

@endsection