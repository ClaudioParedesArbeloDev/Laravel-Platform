@extends('layouts.app')

@section('title', 'Code & Lens - Blog')
    


@section('content')

    <link rel="stylesheet" href="{{ asset('sass/blogs/index.css') }}">

    <div class="blogsContainer">
        <ul class="categories">
            <li class= "options">{{__('programming')}}</li>
            <li class= "options">{{__('computing')}}</li>
            <li class= "options">{{__('photography')}}</li>
            <li class= "options">{{__('cinematography')}}</li>
        </ul>
        <h2 class="news">{{__("What's New")}}</h2>
        @foreach ($blogs as $blog)
        <div class="blog">
            <div class="blogContent">
                <h3 class="blogTitle">{{$blog->title}}</h3>
                <p class="blogCategory">{{__('Category')}}:  {{$blog->category}}</p>
                @if ($blog->image)
                    <img src="{{$blog->image}}" alt="blogImage">    
                @endif
                <p class="blogAuthor">{{__('Author')}}: {{$blog->author}}</p>
                <p class="blogBody">{{$blog->body}}</p>
            </div>
        </div>
         @endforeach

         

    </div>
    
@endsection