@extends('layouts.app')

@section('title', 'Code & Lens - Register User')

@section('content')

    <link rel="stylesheet" href="{{ asset('sass/users/create/create.css') }}">
    
    <div>
        <h2 class="titleCreate">{{ __('Register') }}</h2>

        <form action="{{ route('users.index') }}" method="POST" class="formCreate">
            @csrf

            
            <div class="input-group">
                <label for="name">{{ __('Name') }}:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            
            <div class="input-group">
                <label for="lastname">{{ __('Lastname') }}:</label>
                <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}" required>
                @error('lastname')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            
            <div class="input-group">
                <label for="address">{{ __('Address') }}:</label>
                <input type="text" id="address" name="address" value="{{ old('address') }}" required>
                @error('address')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            
            <div class="input-group">
                <label for="phone">{{ __('Phone') }}:</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required>
                @error('phone')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            
            <div class="input-group">
                <label for="email">{{ __('Email') }}:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            
            <div class="input-group">
                <label for="dni">DNI:</label>
                <input type="text" id="dni" name="dni" value="{{ old('dni') }}" required>
                @error('dni')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            
            <div class="input-group">
                <label for="date_birth">{{ __('Date of Birth') }}:</label>
                <input type="date" id="date_birth" name="date_birth" value="{{ old('date_birth') }}" required>
                @error('date_birth')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

           
            <div class="input-group">
                <label for="username">{{ __('Username') }}:</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" required>
                <span id='response'></span>
                <span id="username-error" class="error-message"></span>
                @error('username')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            
            <div class="input-group">
                <label for="password">{{ __('Password') }}:</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>


            <div class="input-group">
                <label for="password_confirmation">{{ __('Repeat Password') }}:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
                @error('password_confirmation')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <input type="hidden" name="redirect" value="{{ request()->get('redirect', route('success')) }}">

            <button type="submit" class="btn-register">{{ __('Register') }}</button>
        </form>
    </div>

    <script>
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: '{{ __("Validation Error") }}',
                html: `
                    <ul style="text-align: left;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                `
            });
        @endif

    </script>
    <script src="{{ asset('js/login.js') }}"></script>
@endsection
