<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\User;

class ManageController extends Controller
{
    /**
    * Handle an ManageController
    * @author Galaxy 524
    * @param  \Illuminate\Http\Request $request
    * @return View
    */

    public function index(Request $request)
    {   
        return view('admin.manage.index', [
            'menu' => 'manage'
        ]);
    }
    public function getuser(Request $request)
    {
        $users = User::get();
        
        return Datatables::of($users)
                        ->addIndexColumn()
                        ->addColumn('join', function($users){
                            return $users->created_at;
                        })
                        ->make(true);
    }
    public function edituser(Request $request)
    {
        $user = User::find($request->user_id);
        $user->role = $request->user_role;
        $user->status = $request->user_status;
        $user->save();
        return response(json_encode(['success' => true]));
    }
}
