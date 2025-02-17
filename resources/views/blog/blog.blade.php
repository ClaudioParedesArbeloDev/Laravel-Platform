@extends('layouts.app')

@section('title', 'Code & Lens - Blog')
    


@section('content')

<link rel="stylesheet" href="{{ asset('sass/blogs/blog/blog.css') }}">

<div class="blogContainer">
    <span class="blogCategory"> {{__( $blog->category )}}</span>
    <h3 class="blogTitle">{{ $blog->title }}</h3>
    <p class="blogAuthor">{{__('Author')}}: {{ $blog->author }}</p>
    <p class="blogCreatedAt"> {{ $blog->created_at->translatedFormat('j F Y') }}</p>
    <img src="{{ $blog->image }}" alt="blogImage" class="blogImage">
    <div class="blogBody">
        {!! $blog->body !!}
    </div>
    <livewire:like-button :model="$blog" />
    <div>
        <livewire:comments :blog_id="$blog->id" />

    </div>
</div>
    
    
@endsection