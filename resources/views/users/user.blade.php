@extends('layouts.app')

@section('title', 'Code & Lens - User')
    


@section('content')
<link rel="stylesheet" href="{{ asset('sass/user/user.css') }}">

    <div class="user">
        <h2>Datos Alumno: {{$user->lastname}} {{$user->name}}</h2>
        
        <dt>Name:</dt> <p>{{$user->name}}</p>
        <dt>LastName:</dt> <p>{{$user->lastname}}</p>
        <dt>Address:</dt> <p>{{$user->address}}</p>
        <dt>Phone:</dt> <p>{{$user->phone}}</p>
        <dt>Email:</dt> <p>{{$user->email}}</p>
        <dt>DNI:</dt> <p>{{$user->dni}}</p>
        <dt>Date of Birth:</dt> <p>{{$user->date_birth}}</p>
        <dt>UserName:</dt> <p>{{$user->username}}</p>
        
        <a href="/users/{{$user->id}}/edit">Edit User</a>
        
        <form action="/users/{{$user->id}}" method="POST" >
            
            @csrf

            @method('DELETE')

            <button type="submit" class="deleteUser">Delete User</button>
        </form>
    </div>
    
    
@endsection