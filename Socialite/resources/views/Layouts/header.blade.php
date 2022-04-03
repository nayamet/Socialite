<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{URL('custom css/header.css')}}">
    <script src="https://kit.fontawesome.com/3ac9a28dc6.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <div class="nav-left">
            <p class="logo">Socialite</p>
            {{-- <img src="" class="logo"> --}}
            <ul>
                <li><a href="{{route('home')}}"><i class="fa-solid fa-house"></i></a></li>
                <li><a href="{{route('notification.show')}}"><i class="fa-solid fa-bell"></i></li>
                <li><i class="fa-solid fa-message"></i></li>
            </ul>
        </div>
        <div class="nav-right">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type='text' placeholder="Search">
            </div>
            <div class="logout">
                <a href="{{route('logout')}}"><img src="https://img.icons8.com/cute-clipart/50/000000/exit.png"/></a>
            </div>
            <div class="nav-user-icon online">
                <a href="{{route('profile')}}"><img src={{URL('images/profile-icon.png')}}></a>
                
            </div>
        </div>
    </nav>
</body>
</html>

