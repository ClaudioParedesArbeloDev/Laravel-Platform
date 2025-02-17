
@extends('layouts.dashLayouts')

@section('title', 'Code & Lens - My Profile')

@section('content')

    <link rel="stylesheet" href="{{asset('sass/dashboard/perfil/perfil.css')}}">
    <form action="{{ route('profile.update') }}" 
            method="POST" 
            enctype="multipart/form-data"
            class="form-profile">
        @csrf
        @method('PUT')
        <h2>{{__('My Profile')}}</h2>
        <div class="avatar">
            @if ($user->avatar && $user->avatar->avatar)
                <img src="{{ asset('storage/avatars/' . $user->avatar->avatar) }}" alt="avatar">
            @else
                <img src="{{ asset('images/avatars/avatar.png') }}" alt="avatar">
            @endif

            <label>{{ __('Avatar') }}:</label>
            <input type="file" name="avatar" accept="image/*">
            
            @error('avatar')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
    
        <label>{{__('Name')}}:</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}">
    
        <label>{{__('Lastname')}}:</label>
        <input type="text" name="lastname" value="{{ old('lastname', $user->lastname) }}">
    
        <label>{{__('Address')}}:</label>
        <input type="text" name="address" value="{{ old('address', $user->address) }}">
    
        <label>{{__('Phone')}}:</label>
        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}">
    
        <label>{{__('Username')}}:</label>
        <input type="text" name="username" value="{{ old('username', $user->username) }}">
                
        <button type="submit">Actualizar</button>
    </form>

@endsection