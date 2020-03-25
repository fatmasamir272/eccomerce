<?php

namespace App\Http\Controllers\Admin\Api;
use App\Http\Controllers\Controller;
use App\DataTables\NewsDatatable;
use Illuminate\Http\Request;
use App\Model\News;
use App\Model\Comments;
use Validator;
class Users extends Controller
{
    public function login(Request $request)
    {
    	$data = 
            [
                'email'    => 'required|email', 
                'password' => 'required'
           
            ];
         $validate=  Validator(request()->all(),$data);
         if($validate->fails()){
        return response(['status'=>false,'messages'=>$validate->messages()]);
    }else{
if(auth()->attempt(['email'=>request('email'),'password'=>request('password')])){
$user=auth()->user();
$user->api_token=str_random(60);
$user->save();
 return response(['status'=>200,'user'=>$user,'token'=>$user->api_token]);
    }else{

     return response(['status'=>false,'messages'=>'invalid informations email or password']);

    }

    }
    }
}