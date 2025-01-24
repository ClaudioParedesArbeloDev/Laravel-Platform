@extends('layouts.app')

@section('title', 'Code & Lens')



@section('content')

    <link rel="stylesheet" href="{{ asset('sass/users/users/users.css') }}">
    <div class="usersContainer">
    <h2 class="usersListTitle">{{__('Users List')}}</h2>
    <table class="usersList">
        <thead>
            <tr class="usersTableHeader">
                <th>ID</th>
                <th>{{__('Name')}}</th>
                <th>{{__('Lastname')}}</th>
                <th>{{__('Address')}}</th>
                <th>{{__('Phone')}}</th>
                <th>DNI</th>
                <th>{{__('Email')}}</th>
                <th>{{__('Date of Birth')}}</th>
                <th>{{__('Username')}}</th>
                <th>{{__('Edit')}}</th>

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
        <td><a href="/users/{{$user->id}}">{{__('Edit')}}</a></td>
        </tr>
        @endforeach
    </tbody>

    </table>

    {{ $users->links() }}

    </div>




@endsection
