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
                    <p class="blogCategory">{{ $blog->category }}</p>
                    <p class="blogAuthor">{{ $blog->author }} {{$blog->created_at->format('d/m/Y')}}</p>
                    <p class="blogBody">{!! $blog->anticipated !!}</p>
                    <div class="blogFooter">
                        <a href="{{route('blogs.show', $blog)}}" class="btnArt">{{__('Read More')}}</a>
                        <div>
                            <i class="fa-regular fa-message"></i>
                            <span>0</span>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
        <div class="lastBlog">
            <h2>{{__('Popular Articles')}}</h2>
    
        </div>
    </div>
    

@endsection
