@extends('layouts.app')

@section('title', 'Code & Lens - Register User')
    


@section('content')

    <link rel="stylesheet" href="{{asset('sass/create/create.css') }}">
    <div>
    <h2 class="titleCreate">Register</h2>
    <form action="{{route('users.index')}}" method="POST" class="formCreate">
        @csrf
        <label for="name">Name:</label>
            
        <input type="text" id="name" name="name" >
        
        <label for="lastname">LastName:</label>
        
        <input type="text"  id="lastname" name="lastname" >
        
        <label for="address">Address:</label>
        
        <input type="text" id="address" name="address" >
        
        <label for="phone">Phone:</label>
        
        <input type="text" id="phone" name="phone" >
        
        <label for="email">Email:</label>
        
        <input type="text" id="email" name="email" >
        
        <label for="dni">DNI:</label>
        
        <input type="text" id="dni" name="dni" >
        
        <label for="date_birth">Date of Birth:</label>
        
        <input type="text" id="date_birth" name="date_birth" >
        
        <label for="username">UserName:</label>
        
        <input type="text" id="username" name="username" reqcd uired>
        
        <label for="password">Password:</label>
        
        <input type="password" id="password" name="password" required>
        

        <button type="submit">Register</button>
    </form>
    </div>
    
@endsection