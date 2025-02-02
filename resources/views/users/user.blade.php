@extends('layouts.dashLayouts')

@section('title', 'Code & Lens - User')
    
@section('content')

<link rel="stylesheet" href="{{ asset('sass/users/user/user.css') }}">

    <div class="userView">

        <a class='btnBack' href="/users/"><i class="fa-solid fa-arrow-rotate-left"></i></a>

        <h2>{{__('User')}}: {{$user->lastname}}, {{$user->name}}</h2>
        <div class="userWrapper">
            @if ($user->avatar && $user->avatar->avatar)
                <img src="{{ asset('storage/' . $user->avatar->avatar) }}" alt="avatar" class="avatarUser">
            @else
                <img src="{{asset('images/avatars/avatar.png')}}" alt="avatar" class="avatarUser">
            @endif
            <dt>{{__('Name')}}</dt> <p>{{$user->name}}</p>
            <dt>{{__('Lastname')}}</dt> <p>{{$user->lastname}}</p>
            <dt>{{__('Address')}}</dt> <p>{{$user->address}}</p>
            <dt>{{__('Phone')}}</dt> <p>{{$user->phone}}</p>
            <dt>{{__('Email')}}</dt> <p>{{$user->email}}</p>
            <dt>DNI:</dt> <p>{{$user->dni}}</p>
            <dt>{{__('Date of Birth')}}:</dt> <p>{{$user->date_birth}}</p>
            <dt>{{__('Username')}}:</dt> <p>{{$user->username}}</p>
            <dt>{{__('Rol')}}:</dt><p>@foreach($user->roles as $role)<span>{{$role->name}}</span>@if(!$loop->last), @endif @endforeach</p>

            <a href="/users/{{$user->id}}/edit" class = 'btnEdit'>{{__('Edit User')}}</a>

            <form action="/users/{{$user->id}}" method="POST" id="deleteUserForm" >

                @csrf

                @method('DELETE')

                <button type="submit" class="deleteUser">{{__('Delete User')}}</button>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            const deleteUserButton = document.querySelector('.deleteUser');
            const deleteUserForm = document.getElementById('deleteUserForm');
            deleteUserButton.addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteUserForm.submit();
                    Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                    });
                }
            });
        });
        </script>

    </div>


@endsection
