<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('sass/dashboard/sidebar/sidebar.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Claudio Paredes Platform: Aprende y crece en programación con cursos, blogs y más.">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/718dcffbc3.js" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js?render={{env('CLAVE_HTML')}}"></script>
    <script>
        document.addEventListener('submit', function(e){
            e.preventDefault();
        grecaptcha.ready(function() {
            grecaptcha.execute('{{env('CLAVE_HTML')}}', {action: 'submit'}).then(function(token) {

                let form = e.target;
                let input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'g-recaptcha-response';
                input.value = token;
                form.appendChild(input);
                form.submit();
            });
        });
        })
    </script>
    <title>@yield('title', 'Code & Lens')</title>
</head>

<body>
    <div class="sidebarWrapper">
        <div class="lang">
            <a href="/locale/en"><img src="{{asset('images/england.jpg')}}" alt="England Flag"></a>
            <a href="/locale/es"><img src="{{asset('images/spain.jpg')}}" alt="Spain Flag"></a>
        </div>
        <h2 class="titleDashboard">Code & Lens</h2>
        <div class="user">
                @if (Auth::user()->avatar == null)
                    <img src="{{asset('images/avatars/avatar.png')}}" alt="avatar" class="avatarSidebar">
                @else
                    <img src="{{asset('storage/'.Auth::user()->avatar->avatar)}}" alt="avatar" class="avatarSidebar">                    
                @endif
                <pre>{{Auth::user()->name}}</pre>
                <pre>{{Auth::user()->lastname}}</pre>
               

        </div>
        <nav class="navDashboard">
            
            <a href="{{route('dashboard')}}"><i class="fa-solid fa-house"></i><li>{{__('home')}}</li></a>
            <a href="{{route('profile.edit')}}"><i class="fa-solid fa-user"></i><li>{{__('profile')}}</li></a>
            <a href=""><i class="fa-solid fa-comments"></i><li>{{__('chat')}}</li></a>
            <a href="{{route('dashboard.mypath')}}"><i class="fa-solid fa-bezier-curve"></i><li>{{__('my path')}}</li></a>
            <a href="{{route('dashboard.cursos')}}"><i class="fa-brands fa-leanpub"></i><li>{{__('more courses')}}</li></a>
            <a href=""><i class="fa-solid fa-envelope"></i><li>{{__('notifications')}}</li></a>
            @if(Auth::user()->roles->contains('name', 'admin'))
            <a href="{{route('admin')}}"><i class="fa-solid fa-user-tie"></i><li>{{__('admin')}}</li></a>
            @endif

        </nav>

        <div class="logout">
            <form action="/logout" method="POST">
                @csrf
                <a href="#" 
                onclick= "this.closest('form').submit();"><i class="fa-solid fa-arrow-right-from-bracket"></i>{{__('logout')}}</a>
            </form>
        </div>
        <div class="theme-toggle">
            <input type="checkbox" id="switch" />
            <label class="toggle" for="switch">
                <i class="fa-solid fa-sun sun"></i>
                <i class="fa-solid fa-moon moon"></i>
            </label>
            
        </div>
        
    </div>
    @yield('content')

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>