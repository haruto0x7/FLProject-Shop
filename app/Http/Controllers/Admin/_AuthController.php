<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Traits\EmailTrait;
use App\Traits\AnalyticTrait;
use App\Models\User;

class _AuthController extends Controller
{
    /**
    * Handle an authentication.
    * @author Galaxy
    * @param  \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
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
                return redirect()->route('admin.home');
            }else {
                return back()->withErrors(['credentials' => 'Try using valid credentials again.']);
            }
        }else {
            return back()->withErrors(['credentials' => 'Try using valid credentials again.']);
        }       
    }
    public function signout(Request $request)
    {
        if (Auth::check()) {
            $this->analyticlog('SignOut');
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        return redirect()->route('admin.index');
    }
}