@extends('layouts.app')

@section('title', 'Code & Lens - Contact')

@section('content')
    <link rel="stylesheet" href="{{asset('sass/contact/contact.css')}}">
    <div>
        <h1 class="contactTitle">{{__('Do you want to contact us?')}}</h1>
        <div class="contactFormWrapper">
            <form action="{{route('contact.store')}}" method="POST" class="contactForm">
                @csrf

                <label for="name">{{__('Name')}}:</label>
                <input type="text" name="name" id="name" value="{{old('name')}}">
                @error('name')
                    <p class="error">{{$message}}</p>
                @enderror

                <label for="email">{{__('Email')}}:</label>
                <input type="text" name="email" id="email" value="{{old('email')}}">
                @error('email')
                    <p class="error">{{$message}}</p>
                @enderror
                <label for="subject">{{__('Subject')}}:</label>
                <input type="text" name="subject" id="subject" value="{{old('subject')}}">
                @error('subject')
                    <p class="error">{{$message}}</p>
                @enderror
                <label for="message">{{__('Message')}}:</label>
                <textarea name="message" id="message" cols="30" rows="10" value="{{old('message')}}"></textarea>
                @error('message')
                    <p class="error">{{$message}}</p>
                @enderror
                <button type="submit">{{__('Send')}}</button>
            </form>
            @if (session('message'))
                <script>
                    alert("{{session('message')}}");
                </script>
            @endif
        </div>
    </div>
@endsection
