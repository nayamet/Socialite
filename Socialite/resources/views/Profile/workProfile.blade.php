<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL('custom css/workProfile.css')}}">
    <title>Document</title>
</head>
<body>
    @include('Layouts.header')
    
    <div class="container text-center ">
        
        <div class="row">
            <div class=" sidebar col-md-6">
            @include('Layouts.sidebar')
            </div>
            
            <div class="p col-md-6  bg-light shadow">
               
                <div class="card">
                    <div class="img">
                        <img class="img-fluid rounded-top" src="{{URL('images/a.png')}}" alt="cover photo">
                        @if(is_null($profileData->profileImage))
                            
                                <img class="rounded-circle bg-dark" src="{{URL('images/p.jpg')}}" alt="profile image">
                            
                            @else
                                <img class="rounded-circle bg-dark" src="{{asset($profileData->profileImage)}}" alt="profile image">
                            
                            @endif
                        
                    </div>
                    <div class="crad-body">
                        <div class="card-title mt-3">

                            <h3>{{$profileName->name}}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-between  ">
                            <div class="col-4">
                              <button class="btn btn-secondary text-white font-weight-bold" onclick="document.location='{{route('graph')}}'" ><img src="https://img.icons8.com/ios-glyphs/30/000000/add--v1.png"/>Show Graph</button>  
                            </div>
                            <div class="col-4">
                            <button class="btn btn-secondary text-white font-weight-bold" onclick="document.location='{{route('addWorkProfile')}}'" ><img src="https://img.icons8.com/ios-glyphs/30/000000/add--v1.png"/> Add workProfile</button>
                            </div>
                        </div>    

   
                    </div>
                    
                    <div class="card-body">
                        <div class="row mx-5">
                            <table class="align-middle table table-bordered table-responsive{-sm|-md|-lg|-xl}">
                                <tr >
                                    
                                    <th>Institution Name</th>
                                    <th>Starting Date</th>
                                    <th>End Date</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                    
                                </tr>
                                @foreach($workProfiles as $w)
                                @if($w->institution=="")
                                @else
                                <tr>
                                    <td>{{$w->institution}}</td>
                                    <td>{{$w->startYear}}</td>
                                    <td>{{$w->endYear}}</td>
                                    <td>{{$w->position}}</td>
                                    
                                    <td><button class="btn btn-primary text-white font-weight-bold" onclick="document.location='{{route('editWorkProfile')}}/{{encrypt($w->id)}}'" ><img src="https://img.icons8.com/ios-glyphs/20/000000/edit.png"/> Edit</button></td>
                                    <td><button class="btn btn-danger text-white font-weight-bold" onclick="document.location='{{route('deleteWorkProfile')}}/{{$w->id}}'" ><img src="https://img.icons8.com/material/20/000000/filled-trash.png"/>Delete</button></td>
                                    
                                </tr>
                                @endif
                                @endforeach
                            </table>
                        </div>
                        
                    </div>
                    <div class="card-footer ">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>