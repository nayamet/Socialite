<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notification</title>
    <link rel="stylesheet" href="{{URL('custom css/home.css')}}">
    <script src="https://kit.fontawesome.com/3ac9a28dc6.js" crossorigin="anonymous"></script>
</head>
<body>
    @include('Layouts.header')
    <div class="container">
        {{-- left-sidebar --}}
        @include('Layouts.sidebar')
        {{-- main-content --}}
        <div class="main-content">
            @foreach($notifications->reverse() as $n)
                <div class="post-container" style="width: 80%">
                    <p class="post-text"><a style="text-decoration: none;" href="{{route('profile.id', ["userId" => encrypt($n->fk_notifier_users_id)])}}">{{$n->userNotifier->name}}</a>{{" " . $n->msg}}</p>
                    <span style="font-size: small">{{"Time: " . $n->createdAt}}</span>
                </div>
            @endforeach
        </div>
        {{-- right-sidebar --}}
        <div class="right-sidebar"></div>
    </div>
</body>
</html>