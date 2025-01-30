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
        <div class="user">
                @if (Auth::user()->avatar == null)
                    <img src="{{asset('images/avatars/avatar.png')}}" alt="avatar">
                @else
                    <img src="{{asset(Auth::user()->avatar)}}" alt="avatar">                    
                @endif
                <pre>{{Auth::user()->name}}</pre>
                <pre>{{Auth::user()->lastname}}</pre>

        </div>
        <nav class="navDashboard">
            <a href=""><li>{{__('profile')}}</li></a>
            <a href=""><li>{{__('courses')}}</li></a>
            <a href=""><li></li></a>
            <a href=""><li></li></a>
            <a href=""><li></li></a>
            <a href=""><li></li></a>
        </nav>
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