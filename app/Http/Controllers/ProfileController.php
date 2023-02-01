<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Traits\AnalyticTrait;

class ProfileController extends Controller
{
    /**
    * Handle an ProfileController
    * @author Galaxy
    * @param  \Illuminate\Http\Request $request
    * @return View
    */
    
    use AnalyticTrait;

    public function index(Request $request)
    {
        return view('user.profile.index', [
            'menu' => 'profile'
        ]);
    }
    public function password(Request $request)
    {
        $oldpass = $request->account_old_password;
        $newpass = $request->account_new_password;
        $confirmpass = $request->account_retype_new_password;

        if ($newpass != $confirmpass) {
            return back()->withErrors(['confirm' => 'Password confirmation was failed.']);
        }

        $user = Auth::user();

        if((\Hash::check($oldpass, $user->password))){
            $user->password = bcrypt($newpass);
            $user->save();
            $this->analyticlog('Password');
            return back()->withErrors(['success' => 'Password reset was successful.']);
        }else{
            return back()->withErrors(['confirm' => 'Password confirmation was failed.']);
        }
    }
}
