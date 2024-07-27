<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function loadRegister()
    {
         if(Auth::user()){
            $route = $this->redirectDash();
             return redirect($route);
        }
        return view('register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'string|required|min:2',
            'email' => 'string|email|required|max:100|unique:users',
            'password' =>'string|required|confirmed|min:6'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success','Your Registration has been created successfully.');
    }
    public function loadLogin()
    {
        if(Auth::user()){
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'string|required|email',
            'password' => 'string|required'
        ]);

        $userCredential = $request->only('email','password');
        if(Auth::attempt($userCredential)){

            $route = $this->redirectDash();

            return redirect($route)->with('success','You are login Successfully');
        }
        else{
            return back()->with('error','Username & Password is incorrect');
        }
    }

    public function loadDashboard()
    {
        return view('visitor.content.home');
    }
    public function redirectDash()
    {
        $redirect = '';

        if(Auth::user() && Auth::user()->role == 1){
            $redirect = '/super-admin/dashboard';
        }

        else if(Auth::user() && Auth::user()->role == 2){
            $redirect = '/markting-team/dashboard';
        }
        else{
            $redirect = '/visitor-home/town';
        }

        return $redirect;
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
    public function destroy(User $user,$id)
    {

        $plotdelete=User::find($id);
        $plotdelete->delete();
        return redirect()->back();
    }

    function forgotPassword(){
        return view('forget.forgot');
    }
    function forgot(Request $request){
        $data = $request->validate([
            "email"=>'required|exists:users,email'
        ]);

        $token = rand(1000, 9999);
        ; // Generate a 6-digit OTP

        // Save OTP to the database table (assuming you have a 'password_resets' table)
        DB::table('password_reset_tokens')->insert([
            "email"=>$request->email,
            "token"=>$token, // Store OTP instead of token
            "created_at"=>Carbon::now()
        ]);

        // Send OTP via email
        Mail::send('forget.forgotmail',['token'=>$token],function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset password OTP');
        });

        return redirect()->route('verify.email')->with('success', "Email Sent, go check it for OTP.");
    }
    public function verification(){
        return view('forget.verify');
    }
    function resetPassword($token){
        return view('forget.reset',compact('token'));
    }
    public function verifyOTP(Request $request){
        $result = DB::table('password_reset_tokens')->where('token', $request->otp)->first();

        if (!$result) {
            return back()->with('error', 'Invalid OTP. Please try again.'); // Return to previous page with error message
        } else {
            // If the OTP is valid, proceed to redirect the user to the password reset page
            return redirect()->route('reset.password', ['token' => $request->otp])->with('success', 'Your OTP is verified. Proceed to reset your password.');
        }
    }
    function updatePassword(Request $request ,$token){
        $data = $request->validate([
            "email"=>'email|required',
            "password"=>"required",
        ]);
        $check=DB::table('password_reset_tokens')->where([
            "email"=>$request->email,
            "token"=>$token
        ])->first();
        if(!$check){
            return back()->with('message','Something went wrong');
        }
        $user=User::where('email',$request->email)->update([
            "email"=>$request->email,
            "password"=>Hash::make($request->password)
        ]);

        DB::table('password_reset_tokens')->where([
            "token"=>$token
        ])->delete();
        return redirect()->route('login')->with('success', 'Your Password Reset Successfully');
    }
}
