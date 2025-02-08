@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="{{asset('sass/auth/reset/reset.css')}}">

    <div class="container">
        <h2>{{ __('Restablecer Contraseña') }}</h2>
        <form action="{{ route('password.update') }}" method="POST" class="form-group">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email">{{ __('Correo Electrónico') }}</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">{{ __('Nueva Contraseña') }}</label>
                <input type="password" name="password" id="password" class="form-control" required>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">{{ __('Confirmar Nueva Contraseña') }}</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn">{{ __('Restablecer Contraseña') }}</button>
        </form>
    </div>
@endsection
