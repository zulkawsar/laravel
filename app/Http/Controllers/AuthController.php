<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegister;
use App\Http\Requests\loginRequest;
use Illuminate\Auth\Events\Registered;
use App\Jobs\SendVerificationEmail;
Use Mail;
use App\Mail\EmailVerify;
use App\User;

class AuthController extends Controller
{
    public function registerView()
    {
    	return view('Auth.register');
    }

    public function store( UserRegister $request )
    {
    	$user = User::create([
            'name' => $request['name'], 
            'email' => $request['email'] ,
            'password' => bcrypt($request['password']),
            'email_token' => str_random(40).base64_encode($request['email']),
        ]);
        // auth()->login($user);
        Mail::to($user->email)->send(new EmailVerify($user));
        return back()->with('status', 'A e-mail send to your account for verification');
    }


    // public function register(Request $request)
    // {

    //     $this->validator($request->all())->validate();
    //     event(new Registered($user = $this->create($request->all())));
    //     dispatch(new SendVerificationEmail($user));

    //     return back();

    // }

    public function verify($token)

    {

        $user = User::where('email_token',$token)->first();
        if(isset($user) ){
            if (!$user->verified == 1) {
                $user->verified = 1;
                $user->save();
                 $status = "Your e-mail is verified. You can now login.";
            }else{
                $status = "Your e-mail is already verified. You can now login.";
            }
        }else{
            return redirect()->route('login')->with('status', "Sorry your email cannot be identified.");
        }
        return redirect()->route('login')->with('status', $status);
    }



    public function login()
    {
        return view('Auth.login');
    }

    public function loginAuth( loginRequest $request)
    {

        if (auth()->attempt([ 'email' => $request->email, 'password' => $request->password, 'verified' => 1 ])) {
            return redirect()->route('index');
        }else{
            return back()->with('status', 'You Need to verify your account');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('index');
    }
}
