@extends('layouts.app')

@section('title', 'Code & Lens - Register User')
    


@section('content')

    <link rel="stylesheet" href="{{asset('sass/create/create.css') }}">
    <div>
    <h2 class="titleCreate">Edit User</h2>
    <form action="/users/{{$user->id}}" method="POST" class="formCreate">
        
        @csrf

        @method('PUT')
        
        <label for="name">Name:</label>
            
            <input type="text" id="name" name="name" value="{{$user->name}}">
        
        <label for="lastname">LastName:</label>
            <input type="text"  id="lastname" name="lastname" value="{{$user->lastname}}">
        
        <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="{{$user->address}}">
        
        <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="{{$user->phone}}">
        
        <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="{{$user->email}}">
        
        <label for="dni">DNI:</label>
            <input type="text" id="dni" name="dni" value="{{$user->dni}}">
        
        <label for="date_birth">Date of Birth:</label>
            <input type="text" id="date_birth" name="date_birth" value="{{$user->date_birth}}">
        
        <label for="username">UserName:</label>
            <input type="text" id="username" name="username" value="{{$user->username}}">
        
        
        <button type="submit">Update</button>

        
    </form>
    </div>
    
@endsection