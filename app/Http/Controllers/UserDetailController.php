<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;

class UserDetailController extends Controller
{

    public function index(Request $request)
    {

        $user=UserDetail::get();
        $userdata=UserDetail::where('id',$request->id)->first();
        return view('vendor.voyager.user-details.browse', compact('user','userdata'));

    }
    public function validate_email(Request $request)
    {
     $user = UserDetail::where('email', $request->email)->first('email');
        if($user){
          $return =  false;
         }
         else{
          $return= true;
         }
         echo json_encode($return);
         exit;
    }
    public function store(Request $req)
    {

        if($req->id>0){
            $user=UserDetail::find($req->id);
            $user->name=$req->name;
            $user->email=$req->email;
            $user->phone=$req->phone;
            $user->industry=implode(',',array_values($req->industry));
            $user->property_name=$req->property_name;
            $user->address=$req->address;
            $user->city=$req->city;
            $user->hotel_brand=$req->hotel_brand;
            $user->state=$req->state;
            $user->save();

        }else{
            $user=new UserDetail();
            $user->name=$req->name;
            $user->email=$req->email;
            $user->phone=$req->phone;
            $user->industry=implode(',',array_values($req->industry));
            $user->property_name=$req->property_name;
            $user->address=$req->address;
            $user->city=$req->city;
            $user->hotel_brand=$req->hotel_brand;
            $user->state=$req->state;
            $user->save();
        }


        return response()->json(['success'=>'User detail submitted successfully.']);


    }

    public function edit(Request $request)
    {
        $userdata = UserDetail::find($request->id);
        return response()->json($userdata);


    }

    public function destroy($id)
    {
        UserDetail::find($id)->delete();

         return redirect()->back();

    }
}