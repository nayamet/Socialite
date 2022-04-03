
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL('custom css/editProfile.css')}}">
    <title>Document</title>
    
</head>
<body>
@include('Layouts.header')
    <div class="container text-center ">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-md-6 mt-5  p-2 bg-light shadow">
                <form action="{{route('editProfileSubmit')}}" method="post" enctype="multipart/form-data">
                    {{@csrf_field()}}
                    <div class="card">
                        <div class="img">
                            <img class="img-fluid rounded-top"  src="{{URL('images/a.png')}}" alt="cover photo">
                            @if(is_null($profileData->profileImage))
                            
                                <img class="rounded-circle bg-dark" onclick="triggerClick()" id="profileDisplay" src="images/p.jpg " alt="profile image">
                            
                            @else
                                <img class="rounded-circle bg-dark" onclick="triggerClick()" id="profileDisplay" src="{{asset($profileData->profileImage)}} " alt="profile image">
                                
                            @endif
                            <!-- <img class="rounded-circle bg-dark" onclick="triggerClick()" id="profileDisplay" src="{{asset($profileData->profileImage)}} " alt="profile image"> -->
    
                            <input type="file" onchange="displayImage(this)"  name="profileImage" id="profileImage" style="display:none">
                            @error('profileImage')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                        </div>
                        <div class="crad-body">
                            <div class="form mt-5 mb-2  p-4 bg-light shadow col-md-10">
                                <h3><label class="text-left" for="name">Profile Name</label></h3>
                                <input class="form-control" type="text" name="name" id="name" value="{{$profileName->name ?? old('name')}}">
                            </div>
                            <div class="form mt-5 mb-2  p-4 bg-light shadow col-md-10">
                                <div class="col-auto mr-auto ">
                                    <h3><label class="text-left" for="address">Address</label></h3>
                                    <input type="text" class="form-control" name="address" id="address" value="{{$profileData->address ?? old('address')}}">
                                    @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <br>
                                <div class="col-auto ">
                                    <h3><label for="dob">Date of birth</label></h3>
                                    <input type="date" class="form-control" name="dob" id="dob" value="{{$profileData->dob ?? old('dob')}}">
                                    @error('dob')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <br>
                                <div class="col-auto ">
                                <h3><label for="gender">Gender</label></h3>
                                    <select name="gender" id="gender">
                                        <!-- <option value="select" {{$profileData->gender ?? 'selected'}}>Select</option> -->
                                        <option value="male" {{$profileData->gender=='male'? 'selected' :''}}>Male</option>
                                        <option value="female" {{$profileData->gender=='female'? 'selected' :''}}>Female</option>
                                        
                                    </select>
                                    @error('gender')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <br>
                                <div class="col-auto ">
                                <h3><label for="religion">Religion</label></h3>
                                    <select name="religion" id="religion">
                                        <option value="islam" {{$profileData->religion=='islam'? 'selected' :''}}>Islam</option>
                                        <option value="hindu" {{$profileData->religion=='hindu'? 'selected' :''}}>Hindu</option>
                                        <option value="buddhism" {{$profileData->religion=='buddhism'? 'selected' :''}}>Buddhism</option>
                                        <option value="chirstan" {{$profileData->religion=='chirstan'? 'selected' :''}}>Chirstan</option>
                                    </select>
                                    @error('religion')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <br>
                                <div class="col-auto ">
                                <h3><label for="relationship">Relationship</label></h3>
                                    <select name="relationship" id="gender">
                                        <option value="single" {{$profileData->relationship=='single'? 'selected' :''}}>Single</option>
                                        <option value="married" {{$profileData->relationship=='married'? 'selected' :''}}>Married</option>
                                        
                                    </select>
                                    @error('relationship')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="button btn-primary" value="Save">
                    </div>
                </form>
            </div>
            
        </div>
    </div>

    <script src="custom js/editProfile.js"></script>
</body>
</html>