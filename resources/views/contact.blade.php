
@extends('layouts.app')

@section('title', 'Code & Lens - Contact')

@section('content')
    <link rel="stylesheet" href="{{asset('sass/contact/contact.css')}}">
    <div class="contact">
        <h1 class="contactTitle">{{__('Do you want to contact us?')}}</h1>
        <div class="contactFormWrapper">
            <form action="{{route('contact.store')}}" method="POST" class="contactForm">
                @csrf

                <input type="hidden" name="g_recaptcha_response" id="g_recaptcha_response">
                @error('g_recaptcha_response')
                <span class="error">{{ $message }}</span>
                @enderror

                <label for="name">{{__('Name')}}:</label>
                <input type="text" name="name" id="name" value="{{old('name')}}" class="@error('name') is-invalid @enderror">
                @error('name')
                    <p class="error">{{$message}}</p>
                @enderror

                <label for="email">{{__('Email')}}:</label>
                <input type="text" name="email" id="email" value="{{old('email')}}" class="@error('email') is-invalid @enderror">
                @error('email')
                    <p class="error">{{$message}}</p>
                @enderror

                <label for="subject">{{__('Subject')}}:</label>
                <input type="text" name="subject" id="subject" value="{{old('subject')}}" class="@error('subject') is-invalid @enderror">
                @error('subject')
                    <p class="error">{{$message}}</p>
                @enderror

                <label for="message">{{__('Message')}}:</label>
                <textarea name="message" id="message" cols="30" rows="10" value="{{old('message')}}" class="@error('message') is-invalid @enderror"></textarea>
                @error('message')
                    <p class="error">{{$message}}</p>
                @enderror

                <button type="submit">{{__('Send')}}</button>
            </form>
            @if (session('message'))
                <script>
                    Swal.fire({
                        title: "{{__('Message send successfully')}}",
                        text: "{{__('Thank you for your message')}}",
                        icon: "success",
                        confirmButtonText: "{{__('Ok')}}",
                    });

                </script>
            @endif
        </div>
    </div>
@endsection
