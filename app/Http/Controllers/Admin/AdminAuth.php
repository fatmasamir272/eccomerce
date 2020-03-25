<?php

namespace App\Http\Controllers\Admin; //make namespace as admin folder in controller
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Admin;
use App\Mail\AdminResetPassword;
use DB;
use Mail;

use Carbon\Carbon;
class AdminAuth extends Controller
{
    //
    public function login()
    {
    	return view('admin.login'); ///////login page in  admin folder

}
//////////
public function dologin()
    {
    	$rememberme = request('rememberme') == 1 ? true : false ;
if(auth()->guard('admin')->attempt(['email'=>request('email'),'password'=>request('password')],$rememberme)){
    	return redirect('admin'); ///////

    }else{
    	session()->flash('error',trans('admin.pleasecheck'));
    	return redirect('admin/login'); ///////

    }
    }
///////////
     public function logout()
    {
auth()->guard('admin')->logout();
        return redirect('admin/login'); ///////

}
/////////
 public function forgot_password()
    {
        return view('admin.forgot_password');
    }
    /////////
 public function forgot_password_post()
    {
$admin=Admin::where('email',request('email'))->first();
if(!empty($admin))
{
    ///then insert new token using db
$token=app('auth.password.broker')->createToken($admin);
$data=DB::table('password_resets')->insert([
'email'=>$admin->email,
'token'=>$token,
'created_at'=>Carbon::now()
]
);
return new AdminResetPassword(['data'=>$admin,'token'=>$token]);
//Mail::to($admin->email)->send(new AdminResetPassword(['data'=>$admin,'token'=>$token]));
//session()->flash('success','Reset link is sent successfull');
//return  back();

}
return  back();
 }
    ///////////////////////////////
  public function reset_password($token)
    {
        ////check  token & message 2 ours less //fat 2 hours
        $ckeck_token=DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first(); ///less than 2 hours
      //  return dd($ckeck_token);
        if(!empty($ckeck_token)){
            return view('admin.reset_password',['data'=>$ckeck_token]);
        }else{
            return redirect(aurl('/forgot/password'));
        }
}
///////////////////////////////////////

public function reset_password_final($token)
    {
        //return request();
        ///////////////////////validation
        $this->validate(request(),[
'password'=>'required|confirmed',
'password_confirmation'=>'required',],[],[
    ////nice name 
    'password'=>'Password',
    'password_confirmation'=>'Confirmation Password',
        ]);
        ////check  token & message 2 ours less //fat 2 hours
        $ckeck_token=DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first(); ///less than 2 hours
      //  return dd($ckeck_token);
        if(!empty($ckeck_token)){
            ///////////////chenge password && clear data 
           $admin=Admin::where('email',$ckeck_token->email)->update([
            'email'    => $ckeck_token->email,
            'password' => bcrypt(request('password'))
          ]);
                       ////////query builder ///to delete daata
DB::table('password_resets')->where('email',request('email'))->delete();
 /////////automatin login
admin()->attempt(['email'=>$ckeck_token->email,'password'=>request('password')],true);
return redirect(aurl());
        }else{
            return redirect(aurl('/forgot/password'));
        }
}
}
