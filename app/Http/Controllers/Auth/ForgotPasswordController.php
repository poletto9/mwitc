<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    //use SendsPasswordResetEmails; //ปิดเพื่อเปลี่ยนหน้า forgot password ใหม่

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index (){
      return view('auth/passwords/email');
    }

    public function search(Request $request){
      $email = $request->get('email');
      // echo gettype($email);
      // $email = Input::get('email');
      $users = DB::table('users')
      ->select('id','email')
      ->where('email', '=', $email)
      ->get();

      if(sizeof($users) == 1){
        return view('auth/passwords/reset')->with('users',$users);;
      }else{
        return view('auth/passwords/email');
      }
    }
}
