<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('sass/index/index.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/718dcffbc3.js" crossorigin="anonymous"></script>
    <title>Code & Lens</title>
</head>
<body>
    
    <header class="header">
        <a href="" class="logo">
            <div>
                <p class="textLogo1">code & lens</p>
                <p class="textLogo2">PLATFORM</p>
            </div>
        </a>
        <nav class="navIndex">
            <a href="" ><li>Home</li></a>
            <a href=""><li>Courses</li></a>
            <a href=""><li>Blog</li></a>
            <a href=""><li>About</li></a>
            <a href=""><li>Contact</li></a>
        </nav>
        <div class="navLogin">
            <a href="" class="login"><li><i class="fa-solid fa-right-to-bracket"></i>Login</li></a>
            <a href="" class="signup"><li><i class="fa-solid fa-user-plus"></i>Sign Up</li></a>
        </div>
    </header>
    {{$slot}}
    <footer class="footerIndex">
        <p>Copyright &copy; {{date('Y')}} Code & Lens Platform</p>
        <div class="socialMediaFooter">
            <a href="https://www.linkedin.com/in/claudioparedesarbelo/" target="blank" class="iconSocialMedia"><i class="fa-brands fa-linkedin"></i></a>
            <a href="https://github.com/ClaudioParedesArbeloDev" target="blank" class="iconSocialMedia"><i class="fa-brands fa-square-github"></i></a>
            <a href="https://www.instagram.com/claudioparedesdeveloper/" target="blank" class="iconSocialMedia"><i class="fa-brands fa-square-instagram"></i></a>
            <a href="https://x.com/ClaudioPDev" target="blank" class="iconSocialMedia"><i class="fa-brands fa-square-x-twitter"></i></a>
            <a href="https://www.youtube.com/@ClaudioParedesDeveloper" target="blank" class="iconSocialMedia"><i class="fa-brands fa-square-youtube"></i></a>
        </div>
    </footer>
</body>
</html>