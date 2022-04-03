<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="signup-form">
                    @if(Session::has('message'))
                        <div class="alert alert-primary" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <form action="{{route('registration.submit')}}" class="mt-5 border p-4 bg-light shadow" method="POST">
                        {{ csrf_field() }}
                        {{session('from')}}
                        <h4 class="mb-5 text-secondary">Create Your Account</h4>
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label>Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Name">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3 col-md-12">
                                <label>Email<span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12">
                                <label>Password<span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" value="Signup Now" button class="btn btn-primary float-end">
                            <br>
                        </div>
                    </form>
                    <br>
                    <div class="col-md-8">
                        <a href="{{route('registration.google')}}"><button class="btn btn-secondary float-end">Signup with google</button></a>
                     </div>
                     <br>
                     <div>
                        <p class="text-center mt-3 text-secondary">If you have account, Please <a href="{{route('login')}}">Login Now</a></p>
                     </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
