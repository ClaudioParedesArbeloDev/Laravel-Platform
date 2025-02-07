@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ __('Restablecer Contraseña') }}</h2>
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">{{ __('Correo Electrónico') }}</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">{{ __('Enviar enlace de restablecimiento') }}</button>
        </form>
    </div>
@endsection