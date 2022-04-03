<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit comment</title>
    <link rel="stylesheet" href="{{URL('custom css/home.css')}}">
    <script src="https://kit.fontawesome.com/3ac9a28dc6.js" crossorigin="anonymous"></script>
</head>
<body>
    @include('Layouts.header')
    <div class="container">
        @include('Layouts.sidebar')
        <div class="main-content">
            <form action="{{route('comment.edit.submit', ['commentId' => encrypt($comment->id)])}}" method="POST">
                {{ csrf_field() }}
                <div class="user-profile">
                    <img src="https://img.icons8.com/cute-clipart/64/000000/name.png"/>
                    <div class="post-info">
                        <p>{{$comment->user->name}}</p>
                        <span>{{$comment->createdAt}}</span>
                    </div>
                </div>
                <div class="post-input-container" >
                    <textarea name="comment" id=""  rows="3">{{$comment->text}}</textarea>
                    @error('comment')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="submit-post">
                        <input type="image" value="Submit" src='https://img.icons8.com/external-febrian-hidayat-outline-color-febrian-hidayat/64/000000/external-send-user-interface-febrian-hidayat-outline-color-febrian-hidayat.png'/>
                    </div>
                </div>         
            </form>
        </div>
        <div class="right-sidebar"></div>
    </div>
</body>
</html>