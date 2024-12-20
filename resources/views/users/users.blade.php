@extends('layouts.app')

@section('title', 'Code & Lens')
    


@section('content')

    <link rel="stylesheet" href="{{ asset('sass/users/users.css') }}">
    <div class="usersContainer">
    <h2 class="usersListTitle">Users List</h2>
    <table class="usersList">
        <thead>
            <tr class="usersTableHeader">
                <th>ID</th>
                <th>Name</th>
                <th>LastName</th>
                <th>Address</th>
                <th>Phone</th>
                <th>DNI</th>
                <th>Email</th>
                <th>Date of birth</th>
                <th>Username</th>
                <th>Editar</th>

            </tr>  
        </thead>
        <tbody class="usersTableBody">
        @foreach ($users as $user)
        <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->lastname }}</td>
        <td>{{ $user->address }}</td>
        <td>{{ $user->phone }}</td>
        <td>{{ $user->dni }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->date_birth }}</td>
        <td>{{ $user->username }}</td>
        <td><a href="/users/{{$user->id}}">Editar</a></td>
        </tr>
         @endforeach
    </tbody>
        
    </table>

    {{ $users->links() }}

    </div>
    
   
    
    
@endsection