@extends('layouts.app')

@section('title', 'Code & Lens - Create Blog')
    


@section('content')

<link rel="stylesheet" href="{{asset('sass/blogs/create/create.css') }}">
<div class="formWrapper">
<h2 class="titleCreate">{{__('Create Blog')}}</h2>
<form action="{{route('blogs.index')}}" method="POST" class="formCreate">
    @csrf
    <label class="formLabel" for="title">{{__('Title')}}:</label>
        
    <input class="formInput" type="text" id="title" name="title" >
    
    <label class="formLabel" for="category">{{__('Category')}}:</label>
    
    <input class="formInput" type="text"  id="category" name="category" >
    
    <label class="formLabel" for="author">{{__('Author')}}:</label>
    
    <input class="formInput" type="text" id="author" name="author" >
    
    <label class="formLabel" for="anticipated">{{__('Advance')}}:</label>
    
    <input class="formInput" type="text" id="anticipated" name="anticipated" >

    <label class="formLabel" for="image">{{__('Image')}}:</label>
    
    <input class="formInput" type="text" id="image" name="image" >
    
    <label class="formLabel" for="body">{{__('Body')}}:</label>
    
    <textarea class="formText" rows="10" type="text-area" id="body" name="body" ></textarea>
        
    <button class="formButton" type="submit">{{__('Create')}}</button>
</form>
</div>

@endsection