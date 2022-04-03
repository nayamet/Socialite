<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My posts</title>
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
            @foreach($posts->reverse() as $p)
                <div class="post-container">
                    <div class="user-profile">
                        <img src="https://img.icons8.com/cute-clipart/64/000000/name.png"/>
                        <div class="post-info">
                            <a href="{{route('profile.id', ["userId" => encrypt($p->fk_users_id)])}}"><p>{{$p->user->name}}</p></a>
                            <span>{{$p->createdAt}}</span>
                        </div>
                        @if($p->user->id == Session::get('id'))
                            <div class="modify-icon">
                                <a href="{{route('post.edit', ['postId' => encrypt($p->id)])}}"><img src="https://img.icons8.com/external-kiranshastry-lineal-color-kiranshastry/64/000000/external-edit-interface-kiranshastry-lineal-color-kiranshastry-1.png"/></a>
                                <a href="{{route('post.delete', ['postId' => encrypt($p->id)])}}"><img src="https://img.icons8.com/plasticine/100/000000/filled-trash.png"/></a>
                            </div>
                        @endif
                    </div>
                    <p class="post-text">{{$p->postText}}</p>
                    <hr>
                    <div class="post-row">
                        <div></div>
                        <div class="activity-icons">
                            {{-- @php$liked = $p->like->user;@endphp --}}
                            <div><a href="{{route('like', ['postId' => encrypt($p->id)])}}"><img src="https://img.icons8.com/glyph-neue/64/000000/thick-arrow-pointing-up.png"/></a>{{count($p->like)}}</div>
                            <div><a href="{{route('comment.view', ['postId' => encrypt($p->id)])}}"><img src="https://img.icons8.com/color/48/000000/comments--v1.png"/></a>{{count($p->comment)}}</div>
                            <div><a href="{{route('save', ['postId' => encrypt($p->id)])}}"><img src="https://img.icons8.com/external-bearicons-detailed-outline-bearicons/64/000000/external-Save-social-media-bearicons-detailed-outline-bearicons.png"/></a>{{count($p->favourite)}}</div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        {{-- right-sidebar --}}
        <div class="right-sidebar"></div>
    </div>

</body>
</html>