<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL('custom css/addWorkProfile.css')}}">
    <title>Document</title>
</head>
<body>
    @include('Layouts.header')

    <div class="container text-center ">
        
        <div class="row">
            
            <div class=" col-lg-10 col-md-8 offset-md-2  mt-5  p-2 bg-light shadow">
               
                <div class="card">
                    
                    <div class="crad-body">
                        
                        <div class="form mt-5 mb-5  p-4 bg-light shadow col-md-10">
                            <form action="{{route('editWorkProfileSubmit')}}" method="post">
                                {{csrf_field()}}
                                <h2 style="text-align:center">Edit Work Profile</h2>
                                <input type="hidden" name="w_id" value="{{$wp->id}}">
                                <h3><label>Institution Name<span class="text-danger">*</span></label></h3>
                                
                                <div class="col-md-4">
                                    <input type="text" name="institution" class="form-control" value="{{$wp->institution ?? old('institution')}}" placeholder="Enter Institution Name">
                                    @error('institution')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <br>
                                <h3><label>Start Date<span class="text-danger">*</span></label></h3>
                                
                                <div class="col-md-4">
                                    <input type="date" value="{{$wp->startYear ?? old('startYear')}}" name="startYear" class="form-control" >
                                    @error('startYear')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <br>
                                <h3><label>End Date<span class="text-danger">*</span></label></h3>
                                
                                <div class="col-md-4">
                                    <input type="date" value="{{$wp->endYear ?? old('endYear')}}" name="endYear" class="form-control" >
                                    @error('endYear')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <br>
                                <h3><label>Position<span class="text-danger">*</span></label></h3>
                                
                                <div class="col-md-4">
                                    <input type="text" value="{{$wp->position ?? old('position')}}" name="position" class="form-control" >
                                    @error('position')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <br><br>
                                
                                <input type="submit" class="button btn-primary" value="Save">
                                

                                
                                
                            </form>
                        </div>
                    </div>
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
    
    
</body>
</html>