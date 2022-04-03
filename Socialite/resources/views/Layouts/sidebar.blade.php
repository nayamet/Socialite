<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{URL('custom css/home.css')}}">
    <script src="https://kit.fontawesome.com/3ac9a28dc6.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="left-sidebar">
        <div class="imp-links">
            <a href="{{route('profile')}}"><img src="https://img.icons8.com/plasticine/100/000000/administrator-male.png"/>Profile</a>
            <a href="{{route('workProfile')}}"><img src="https://img.icons8.com/external-soft-fill-juicy-fish/60/000000/external-work-love-soft-fill-soft-fill-juicy-fish.png"/>Work profile</a>
            <a href="{{route('my.posts')}}"><img src="https://img.icons8.com/external-soft-fill-juicy-fish/60/000000/external-write-customer-feedback-soft-fill-soft-fill-juicy-fish.png"/>My posts</a>
            <a href="{{route('save.show')}}"><img src="https://img.icons8.com/fluency/48/000000/likes-folder--v2.png"/>Favourite posts</a>
            <a href="{{route('follower.show')}}"><img src="https://img.icons8.com/external-wanicon-lineal-color-wanicon/64/000000/external-followers-influencer-marketing-wanicon-lineal-color-wanicon.png"/>Followers</a>
            <a href="{{route('following.show')}}"><img src="https://img.icons8.com/external-wanicon-lineal-color-wanicon/64/000000/external-love-friendship-wanicon-lineal-color-wanicon.png"/></i>Following</a>
            <a href="{{route('invoice')}}"><img src="https://img.icons8.com/color/48/000000/download--v1.png"/></i>Download Profile Information</a>
        
            @if(Session::get('type') == 'Admin')
                <a href="{{route('admin.dashboard')}}"><img src="https://img.icons8.com/color/48/000000/admin-settings-male.png"/>Admin Dashboard</a>
            @endif
            <a href="#">See more</a>
        </div>
    </div>
</body>
</html>