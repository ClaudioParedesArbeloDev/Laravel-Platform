@extends('layouts.app')

@section('title', 'Code & Lens - User')



@section('content')
<link rel="stylesheet" href="{{ asset('sass/users/user/user.css') }}">

    <div class="user">

        <a class='btnBack' href="/users/">{{__('Back')}}</a>

        <h2>{{__('User')}}: {{$user->lastname}}, {{$user->name}}</h2>

        <dt>{{__('Name')}}</dt> <p>{{$user->name}}</p>
        <dt>{{__('Lastname')}}</dt> <p>{{$user->lastname}}</p>
        <dt>{{__('Address')}}</dt> <p>{{$user->address}}</p>
        <dt>{{__('Phone')}}</dt> <p>{{$user->phone}}</p>
        <dt>{{__('Email')}}</dt> <p>{{$user->email}}</p>
        <dt>DNI:</dt> <p>{{$user->dni}}</p>
        <dt>{{__('Date of Birth')}}:</dt> <p>{{$user->date_birth}}</p>
        <dt>{{__('Username')}}:</dt> <p>{{$user->username}}</p>

        <a href="/users/{{$user->id}}/edit">{{__('Edit User')}}</a>

        <form action="/users/{{$user->id}}" method="POST" >

            @csrf

            @method('DELETE')

            <button type="submit" class="deleteUser">{{__('Delete User')}}</button>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const deleteUser = document.querySelector('.deleteUser');
    deleteUser.addEventListener('click', () => {
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
            Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success"
            });
        }
});
</script>

    </div>


@endsection
