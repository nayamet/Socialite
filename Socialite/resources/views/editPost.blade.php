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
                        <p>{{$post->user->name}}</p>
                    </div>
                </div>
                <form action="{{route('post.edit.submit', ['postId' => encrypt($post->id)])}}" method="POST">
                    {{ csrf_field() }}
                    <div class="post-input-container">
                        <textarea name="postData" id=""  rows="3">{{$post->postText}}</textarea>
                        @error('postData')
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
        </div>
        <div class="right-sidebar"></div>
    </div>
</body>
</html>