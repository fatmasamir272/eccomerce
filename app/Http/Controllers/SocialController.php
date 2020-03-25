<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
 use Socialite;
 use App\User;
 class SocialController extends Controller
 {
 	public function store(Request $request){
   $data = $this->validate(request(),
            [
                'name'     => 'required',
                'email'    => 'required|email|unique:users', /////unique for table admins
                
            ]);
           $data['password'] = bcrypt('123456');

          // $data->name=$request->name;
           //$data->email=$request->email;

        User::create($data);
    return response()->json($request) ;
 }

 /*public function redirect($provider);
 {
     return Socialite::driver($provider)->redirect();

 }

 public function callback($provider)
 {
   $getInfo = Socialite::driver($provider)->user(); 
   $user = $this->createUser($getInfo,$provider); 
   auth()->login($user); 
   return redirect()->to('/home');
 }
 function createUser($getInfo,$provider){
 $user = User::where('provider_id', $getInfo->id)->first();
 if (!$user) {
      $user = User::create([
         'name'     => $getInfo->name,
         'email'    => $getInfo->email,
         'provider' => $provider,
         'provider_id' => $getInfo->id
     ]);
   }
   return $user;
 }*/
 }