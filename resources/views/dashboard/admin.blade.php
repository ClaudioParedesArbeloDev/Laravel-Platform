@extends('layouts.dashLayouts')

@section('title', 'Code & Lens - AdminPage')
    
@section('content')
    <link rel="stylesheet" href="{{asset('sass/dashboard/admin/admin.css')}}">
    <div class="adminWrapper">
        <h2 class="adminTitle">{{__('Admin Page')}}</h2>
        
            <li class="adminList">{{__('users')}}</li>
            <a href="{{route('users.index')}}" class="btnAdmin">{{__('view')}}</a>
            <a href="{{route('users.create')}}" class="btnAdmin1">{{__('create')}}</a>
            
    
        
        
            <li class="adminList">{{__('courses')}}</li>
            <a href="{{route('courses.index')}}" class="btnAdmin">{{__('view')}}</a>
            <a href="{{route('courses.create')}}" class="btnAdmin1">{{__('create')}}</a>
            
        
            <li class="adminList">{{__('classes')}}</li>
            <a href="{{route('classes.create')}}" class="btnAdmin1">{{__('create')}}</a>
            
        
            <li class="adminList">{{__('blogs')}}</li>
            <a href="{{route('blogs.index')}}" class="btnAdmin">{{__('view')}}</a>
            <a href="{{route('blogs.create')}}" class="btnAdmin1">{{__('create')}}</a>
            
        
       
        

    </div>
@endsection