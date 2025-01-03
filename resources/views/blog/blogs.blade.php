@extends('layouts.app')

@section('title', 'Code & Lens - Blog')



@section('content')

    <link rel="stylesheet" href="{{ asset('sass/blogs/index.css') }}">
    <img src="{{ asset('images/blogs.png') }}" alt="blogImage" class="blogImage">
    <div class="blogsContainer">
        <h2 class="news">{{ __("What's New") }}</h2>
        <div class="select">
            <select name="options" id="options" class="options">
                <option value="value1">{{__('All Categories')}}</option>
                <option value="programming">{{__('programming')}}</option>
                <option value="value3">{{__('computing')}}</option>
                <option value="value4">{{__('photography')}}</option>
                <option value="value5">{{__('cinematography')}}</option>
            </select>
        </div>
        @foreach ($blogs as $blog)
            <div class="blog">
                <div class="blogContent">
                    <img src="{{ $blog->image }}" alt="blogImage" class="blogIndImage">
                    <h3 class="blogTitle">{{ $blog->title }}</h3>
                    <p class="blogAuthor">{{ $blog->author }} {{$blog->created_at}}</p>
                    <p class="blogCategory">{{ $blog->category }}</p>
                    <p class="blogBody">{!! $blog->anticipated !!}</p>
                    <div class="blogFooter">
                        <button>{{__('Read More')}}</button>
                        <i class="fa-regular fa-message"></i>
                    </div>

                </div>
            </div>
        @endforeach
        <div class="lastBlog">
            <h2>{{__('Popular Articles')}}</h2>
    
        </div>
    </div>
    

@endsection
