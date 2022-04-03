<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
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
            <div class="write-post-container">
                <div class="user-profile">
                    <img src="https://img.icons8.com/cute-clipart/64/000000/name.png"/>
                    <div class="">
                        <p>{{Session::get('name')}}</p>
                    </div>
                </div>
                <form action="{{route('post.create')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="post-input-container">
                        <textarea name="postData" id=""  rows="3" placeholder="Share your lite, {{Session::get('name')}}"></textarea>
                        @error('post-data')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="add-post-links">
                            <a href="#"><img src="https://img.icons8.com/cute-clipart/64/000000/video-message.png"/>Live video</a>
                            <a href="#"><img src="https://img.icons8.com/cute-clipart/64/000000/image-gallery.png"/>Photo/Video</a>
                            <a href="#"><img src="https://img.icons8.com/cute-clipart/64/000000/comedy.png"/>Feeling/Activity</a>
                        </div>
                        <div class="submit-post">
                            <input type="image" value="Submit" src='https://img.icons8.com/external-febrian-hidayat-outline-color-febrian-hidayat/64/000000/external-send-user-interface-febrian-hidayat-outline-color-febrian-hidayat.png'/>
                        </div>
                    </div>         
                </form>
            </div>

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