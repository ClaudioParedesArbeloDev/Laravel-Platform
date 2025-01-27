@extends('layouts.app')

@section('title', 'Code & Lens - Instructor')
    


@section('content')

<link rel="stylesheet" href="{{ asset('sass/instructors/instructor/instructor.css') }}">

<div class="user">

    <h2>{{__('Instructor')}}: {{$instructor->name}} {{$instructor->surname}}</h2>

    <dt>{{__('Name')}}</dt> <p>{{$instructor->name}}</p>
    <dt>{{__('Surname')}}</dt> <p>{{$instructor->surname}}</p>
    <dt>{{__('Email')}}</dt> <p>{{$instructor->email}}</p>
    <dt>{{__('Phone')}}</dt> <p>{{$instructor->phone}}</p>
    <dt>{{__('Bio')}}</dt> <p>{{$instructor->bio}}</p>
    <img src="{{asset($instructor->avatar)}}" alt="avatar">


    <a href="/instructors/{{$instructor->id}}/edit">{{__('Edit Instructor')}}</a>

    <form action="/instructors/{{$instructor->id}}" method="POST" >

        @csrf

        @method('DELETE')

        <button type="submit" class="deleteUser">{{__('Delete Instructor')}}</button>


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