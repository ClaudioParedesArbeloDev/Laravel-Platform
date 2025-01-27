@extends('layouts.app')

@section('title', 'Code & Lens - Edit Instructor')



@section('content')

    <link rel="stylesheet" href="{{asset('sass/instructors/create/create.css') }}">
    <div>
    <h2 class="titleCreate">{{__('Edit Instructor')}}</h2>
    <form action="/instructors/{{$instructor->id}}" method="POST" class="formCreate">

        @csrf

        @method('PUT')

        <label for="name">{{__('Name')}}:</label>

            <input type="text" id="name" name="name" value="{{$instructor->name}}">

        <label for="surname">{{__('Surname')}}:</label>
            <input type="text"  id="surname" name="surname" value="{{$instructor->surname}}">

        <label for="phone">{{__('Phone')}}:</label>
            <input type="text" id="phone" name="phone" value="{{$instructor->phone}}">

        <label for="email">{{__('Email')}}:</label>
            <input type="text" id="email" name="email" value="{{$instructor->email}}">

        <label for="bio">{{__('Bio')}}:</label>
            <textarea id="bio" name="bio">{{$instructor->bio}}</textarea>

        <label for="avatar">{{__('Avatar')}}:</label>
            <input type="text" id="avatar" name="avatar" value="{{$instructor->avatar}}">

        <button type="submit">{{__('Update')}}</button>

        <a href="/instructors/{{$instructor->id}}" class="btnCancel">{{__('Cancel')}}</a>


    </form>
    </div>

@endsection
