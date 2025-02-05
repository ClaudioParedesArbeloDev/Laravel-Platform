<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('sass/index/index.css') }}">
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
    <header class="header">
        <a href="{{ route('home') }}" class="logo">
            <div>
                <p class="textLogo1">Code & Lens</p>
                <p class="textLogo2">PLATFORM</p>
            </div>
        </a>
        <nav class="navIndex">
            <a href="{{ route('home') }}">
                <li>{{ __('home') }}</li>
            </a>
            <a href="{{route('cursos')}}">
                <li>{{ __('courses') }}</li>
            </a>
            <a href="{{route('blogs.index')}}">
                <li>{{ __('Blog') }}</li>
            </a>
            <a href="{{route('aboutus')}}">
                <li>{{ __('about') }}</li>
            </a>
            <a href="{{route('contact.index')}}">
                <li>{{ __('contact') }}</li>
            </a>
        </nav>
        
        <div class="navLogin">
        @guest
            <a href="{{ route('login') }}" class="login"><i class="fa-solid fa-user">
                    <p>{{ __('Log in') }}</p>
                </i></a>
        @endguest
        @auth
            <a href="/dashboard" class="btnPlatform">
                @if (Auth::user()->avatar == null)
                    <img src="{{asset('images/avatars/avatar.png')}}" alt="avatar" class="avatarSidebar">
                @else
                    <img src="{{asset('storage/'.Auth::user()->avatar->avatar)}}" alt="avatar" class="avatarSidebar">                    
                @endif
                <p>{{__('Hello')}}</p>
                <p> {{Auth::user()->name}}</p></a>
        @endauth

        </div>

        <div class="theme-toggle">
            <input type="checkbox" id="switch" />
            <label class="toggle" for="switch">
                <i class="fa-solid fa-sun sun"></i>
                <i class="fa-solid fa-moon moon"></i>
            </label>
        </div>

    </header>

    @yield('content')

    <footer class="footerIndex">
        <div class="lang">
            <a href="/locale/en"><img src="{{asset('images/england.jpg')}}" alt="England Flag"></a>
            <a href="/locale/es"><img src="{{asset('images/spain.jpg')}}" alt="Spain Flag"></a>
        </div>
        <p class="copyright">Copyright &copy; {{ date('Y') }} Code & Lens Platform</p>
        <div class="socialMediaFooter">
            <a href="https://www.linkedin.com/in/claudioparedesarbelo/" target="blank" class="iconSocialMedia"><i
                    class="fa-brands fa-linkedin-in"></i></a>
            <a href="https://github.com/ClaudioParedesArbeloDev" target="blank" class="iconSocialMedia"><i
                    class="fa-brands fa-github"></i></a>
            <a href="https://www.instagram.com/claudioparedesdeveloper/" target="blank" class="iconSocialMedia"><i
                    class="fa-brands fa-instagram"></i></a>
            <a href="https://x.com/ClaudioPDev" target="blank" class="iconSocialMedia"><i
                    class="fa-brands fa-x-twitter"></i></a>
            <a href="https://www.youtube.com/@ClaudioParedesDeveloper" target="blank" class="iconSocialMedia"><i
                    class="fa-brands fa-youtube"></i></a>
        </div>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
