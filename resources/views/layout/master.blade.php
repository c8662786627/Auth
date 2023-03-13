<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - shop laravel</title>
</head>
<body>
    <header>
        <ul>
        @if(session()->has('user_id'))
            <li><a href="/user/auth/sign-out">登出</a></li>
            
        
        @else
            <li><a href="/user/auth/sign-up">註冊</a></li>
            <li><a href="/user/auth/sign-in">登入</a></li>
        @endif
        </ul>
    </header>
    <div class="container">
        @yield('content')
    </div>
    <footer>
        <a href="#">聯絡我們</a>
    </footer>

</body>
</html>
