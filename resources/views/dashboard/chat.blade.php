@extends('layouts.dashLayouts')

@section('title', 'Code & Lens - Chat')
    
@section('content')

    <link rel="stylesheet" href="{{asset('sass/chat/chat.css') }}">

    <div class="chat-container">
        <h3>Chat - Code & Lens</h3>

    @livewire("chat-form",[
        'user' => Auth::user(),
    ])

    @livewire("chat-list")

    </div>

@endsection