@extends('layouts.app')

@section('title', 'Code & Lens - Register User')


@section('content')

    <link rel="stylesheet" href="{{asset('sass/users/create/create.css') }}">
    <div>
    <h2 class="titleCreate">{{__('Register')}}</h2>
    <form action="{{route('users.index')}}" method="POST" class="formCreate">
        @csrf
        <label for="name">{{__('Name')}}:</label>

        <input type="text" id="name" name="name" >

        <label for="lastname">{{__('Lastname')}}:</label>

        <input type="text"  id="lastname" name="lastname" >

        <label for="address">{{__('Address')}}:</label>

        <input type="text" id="address" name="address" >

        <label for="phone">{{__('Phone')}}:</label>

        <input type="text" id="phone" name="phone" >

        <label for="email">{{__('Email')}}:</label>

        <input type="text" id="email" name="email" >

        <label for="dni">DNI:</label>

        <input type="text" id="dni" name="dni" >

        <label for="date_birth">{{__('Date of Birth')}}:</label>

        <input type="date" id="date_birth" name="date_birth" >

        <label for="username">{{__('Username')}}:</label>

        <input type="text" id="username" name="username" reqcd uired>

        <label for="password">{{__('Password')}}:</label>

        <input type="password" id="password" name="password" required>

        <label for="repeat_password">{{__('Repeat Password')}}:</label>

        <input type="password" id="repeat_password" name="repeat_password" required>

        <button type="submit">{{__('Register')}}</button>
    </form>
    </div>

@endsection
