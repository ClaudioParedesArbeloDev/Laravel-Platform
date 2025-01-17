@extends('layouts.app')

@section('title', 'Code & Lens - Blog')
    


@section('content')

<link rel="stylesheet" href="{{ asset('sass/blogs/blog/blog.css') }}">

<div class="blogContainer">
    <span class="blogCategory">{{__( $blog->category )}}</span>
    <h3 class="blogTitle">{{ $blog->title }}</h3>
    <p class="blogAuthor">{{ $blog->author }}</p>
    <p class="blogCreatedAt">{{ $blog->created_at->format('d/m/Y') }}</p>
    <img src="{{ $blog->image }}" alt="blogImage" class="blogIndImage">
    <div class="blogBody">
        {!! $blog->body !!}
    </div>
    <div>
        <p>{{__('Comments')}}</p>
    </div>
</div>
    
    
@endsection