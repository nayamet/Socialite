<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        h1 {
  text-align: center;
}

    </style>
    <title>Invoice</title>
    
</head>
    <body>
        <div class="container">
            <h1 >Profile Information</h1>
            <br>
            <h2>Personal Details :</h2>
            <hr>
            <div>
                <span>Name : </span>
                <span>{{$user->name}}</span>
                <br>
                <span>Date Of Birth : </span>
                <span>{{$profileData->dob}}</span>
                <br>
                <span>Gender : </span>
                <span>{{$profileData->gender}}</span>
                <br>
                <span>Religion : </span>
                <span>{{$profileData->religion}}</span>
                <br>
                <span>relationship : </span>
                <span>{{$profileData->relationship}}</span>
                <br>
                <span>Email : </span>
                <span>{{$user->email}}</span>
                <br>
                <span>Address</span>
                <span>{{$profileData->address}}</span>
            </div>
            <h2>Working Experience :</h2>
            <hr>
            <div>
                <table>
                    <tr>
                        <th>Institution Name</th>
                        <th>Starting Date</th>
                        <th>End Date</th>
                        <th>Position</th>
                    </tr>
                    @foreach($workProfiles as $w)
                    @if($w->institution=="")
                    @else
                    <tr>
                        <td>{{$w->institution}}</td>
                        <td>{{$w->startYear}}</td>
                        <td>{{$w->endYear}}</td>
                        <td>{{$w->position}}</td>
                                   
                    </tr>
                    @endif
                    @endforeach
                </table>
            </div>
            
        </div>
        

    </body>
</html>