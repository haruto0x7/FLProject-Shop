<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Traits\EmailTrait;
use App\Traits\AnalyticTrait;
use App\Models\User;


class _AuthController extends Controller
{
    /**
    * Handle an _AuthController
    * @author Galaxy
    * @param  \Illuminate\Http\Request $request
    * @return View
    */

    use AnalyticTrait;
    use EmailTrait;

    public function signin(Request $request)
    {
        $email = $request->login_email;
        $password = $request->login_password;
        $remember = $request->remember_me;

        if($remember) $remember = true; else $remember = false;

        $credentials = ['email' => $email, 'password' => $password];
        
        $validator = Validator::make($request->all(), [
            'login_email' => 'required | email',
            'login_password' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors(['validator' => 'Login validation is incorrect.']);
        }
        
        $user = User::where('email', $email)->first();

        if ($user) {
            if($user->status == 'Block'){
                return back()->withErrors(['block' => 'Your account was block by site.']);
            }
            if (Auth::attempt($credentials, $remember)) {
                $this->analyticlog('SignIn');
                $request->session()->regenerate();
                return redirect()->route('home');
            }else {
                return back()->withErrors(['credentials' => 'Try using valid credentials again.']);
            }
        }else {
            return back()->withErrors(['credentials' => 'Try using valid credentials again.']);
        }       
    }
    public function signup(Request $request)
    {
        $name = $request->register_username;
        $email = $request->register_email;
        $password = $request->register_password;
        $confirm = $request->register_confirm;

        $validator = Validator::make($request->all(), [
            'register_username' => 'required',
            'register_email' => 'required | email',
            'register_password' => 'required',
            'register_confirm' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors(['validator' => 'SignUp validation is incorrect.']);
        }

        if($password != $confirm){
            return back()->withErrors(['confirm' => 'Password confirmation is incorrect.']);
        }

        $check = User::where('email', $email)->first();
        if (!$check) {
            $user = new User;
            $user->name = $name;
            $user->email = $email;
            $user->password = bcrypt($password);
            $user->save();
            
            if (Auth::attempt(['email' => $email, 'password' => $password], false)) {
                $this->analyticlog('SignUp');
                $request->session()->regenerate();
                return redirect()->route('home');
            }else {
                return back()->withErrors(['credentials' => 'Try using valid credentials again.']);
            }
        } else {
            return back()->withErrors(['exist' => 'This email already exists.']);
        }
        // return back()->withErrors(['email' => 'Something went wrong in email verification.']);
    }
    public function signout(Request $request)
    {
        if (Auth::check()) {
            $this->analyticlog('SignOut');
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        return redirect()->route('index');
    }
    public function password(Request $request)
    {
        $email = $request->forgot_password_email;
        
        $validator = Validator::make($request->all(), [
            'forgot_password_email' => 'required | email',
        ]);

        if ($validator->fails()) {
            return back()->withErrors(['validator' => 'Email validation is incorrect.']);
        }

        // $this->
    }
}

