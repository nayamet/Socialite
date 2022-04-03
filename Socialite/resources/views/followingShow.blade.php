<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Followers</title>
    <link rel="stylesheet" href="{{URL('custom css/follower.css')}}">
    <script src="https://kit.fontawesome.com/3ac9a28dc6.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    @include('Layouts.header')
    <div class="container">
        @include('Layouts.sidebar')
        <div class="main-content">
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Profile Image</th>
                    <th scope="col">Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($followings as $f)
                <tr class="row-data">
                    <td scope="row">1</td>
                    <td><a href="{{route('profile.id', ["userId" => encrypt($f->fk_users_id)])}}">{{$f->user->name}}</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="right-sidebar"></div>
    </div>
</body>
</html>