<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Models\Work_profile;
use PDF;
use App\Models\Follower;


class ProfileController extends Controller
{
    
    public function graph()
    {
        $userId=session()->get('id');
        $data="";
        $result=Work_profile::where('fk_users_id','=',$userId)->select('institution','startYear','endYear')->get();
        foreach($result as $a)
        {
            $startDate = strtotime($a->startYear) ;
            $endDate=strtotime($a->endYear);
            $d=($endDate-$startDate)/(60*60*24);
            $data.="['".$a->institution."',   ".$d."],";
        }
        // dd($data);
        $chartData=$data;
        return view('Profile.graph',compact('chartData'));
    }
    public function invoice()
    {
        $userId=session()->get('id');
        $profileData=Profile::where('fk_users_id','=',$userId)->first();
        $workProfiles=Work_profile::where('fk_users_id','=',$userId)->get();
        $user=User::where('id','=',$userId)->first();
        // return view('Profile.invoice',compact('workProfiles','user','profileData'));

        $pdf=PDF::loadView('Profile.invoice',compact('workProfiles','user','profileData'));
        return $pdf->download('invoice.pdf');
    }
    public function getWorkProfile()
    {
        $userId=session()->get('id');
        $profileData=Profile::where('fk_users_id','=',$userId)->first();
        $profileName=User::where('id','=',$userId)->select('name')->first();

        $workProfiles=Work_profile::where('fk_users_id','=',$userId)->get();
        return view('Profile.workProfile')->with('profileData',$profileData)->with('profileName',$profileName)->with('workProfiles',$workProfiles);

    }
    public function addWorkProfile()
    {
        
        return view('Profile.addWorkProfile');
    }
    public function addWorkProfileSubmit(Request $req)
    {
        $userId=session()->get('id');
        $req->validate(
            [
                'institution'=>'required',
                'startYear'=>'required',
                'endYear'=>'required',
                'position'=>'required|regex: /^[A-Z a-z]+$/',

            ]
            );
        $workProfile=new Work_profile();
        $workProfile->institution=$req->institution;
        $workProfile->startYear=$req->startYear;
        $workProfile->endYear=$req->endYear;
        $workProfile->position=$req->position;
        $workProfile->fk_users_id=$userId;
        $workProfile->save();
        return redirect()->route('workProfile');

    }

    public function deleteWorkProfile($id)
    {
        $delete=Work_profile::where('id','=',$id)->delete();
        return redirect()->route('workProfile');
    }

    public function editWorkProfile($id)
    {
        $workProfile=Work_profile::where('id','=',decrypt($id))->first();
        return view('Profile.editWorkProfile')->with('wp',$workProfile);
    }
    public function editWorkProfileSubmit(Request $req)
    {
        $req->validate(
            [
                'institution'=>'required',
                'startYear'=>'required',
                'endYear'=>'required',
                'position'=>'required|regex: /^[A-Z a-z]+$/',

            ]
            );
        $workProfile=Work_profile::where('id','=',$req->w_id)->first();
        $workProfile->institution=$req->institution;
        $workProfile->startYear=$req->startYear;
        $workProfile->endYear=$req->endYear;
        $workProfile->position=$req->position;
        $workProfile->save();
        return redirect()->route('workProfile');
    }
    public function editProfileData()
    {
        if(session()->has('id'))
        {
            $userId=session()->get('id');
            $profileData=Profile::where('fk_users_id','=',$userId)->first();
            
            $profileName=User::where('id','=',$userId)->select('name')->first();
            // return  $profileName;
            return view('Profile.editProfile')->with('profileData',$profileData)->with('profileName',$profileName);
        }
    }
    public function editProfileDataSubmit(Request $req)
    {
        $userId=session()->get('id');
        
        $req->validate(
            [
                'name'=>'required | regex: /^[A-Z a-z]+$/',
                'address'=>'required',
                'dob'=>'required',
                'gender'=>'required',
                'religion'=>'required',
                'relationship'=>'required',
                'profileImage'=>'mimes:jpg,png',
            ]
            );
        $profile=Profile::where('fk_users_id','=',$userId)->first();
        $user=User::where('id','=',$userId)->first();
        if($req->file('profileImage')=='')
        {
            $filename=$profile->profileImage;
            $profile->address=$req->address;
            $profile->dob=$req->dob;
            $profile->gender=$req->gender;
            $profile->religion=$req->religion;
            $profile->relationship=$req->relationship;
            $profile->fk_users_id=$userId;
            $profile->save();
            $user->name=$req->name;
            $user->save();
            
        }
        else{
            $filename=$req->name.'.'.$req->file('profileImage')->getClientOriginalExtension();
        //  return $filename;
            $req->file('profileImage')->storeAs('public/images',$filename);
            $profile->address=$req->address;
            $profile->dob=$req->dob;
            $profile->gender=$req->gender;
            $profile->religion=$req->religion;
            $profile->relationship=$req->relationship;
            $profile->profileImage="storage/images/".$filename;
            $profile->fk_users_id=$userId;
            $profile->save();
            $user->name=$req->name;
            $user->save();
        }
        
        Session::flash('message', 'Profile upload successful');
        return redirect()->route('profile');
    }

 
    public function getProfileData()
    {
        if(session()->has('id'))
        {
            $userId=session()->get('id');
            $profileData=Profile::where('fk_users_id','=',$userId)->first();
            $profileName=User::where('id','=',$userId)->select('name')->first();
            
            //return $profileData->profileImage;
            return view('Profile.profile')->with('profileData',$profileData)->with('profileName',$profileName);
        }
        // else
        // return failed;
    }

    public function getProfileByID(Request $req)
    {
        $userId = decrypt($req->userId);
        $profileData=Profile::where('fk_users_id','=',$userId)->first();
        $profileName=User::where('id','=',$userId)->select('name')->first();
        $result = Follower::select('*')->where([
            ['fk_follower_users_id', '=', Session::get('id')],
            ['fk_users_id', '=', $userId]
        ])->first();
        return view('Profile.profile')->with('profileData',$profileData)->with('profileName',$profileName)->with('result', $result);
    }

}