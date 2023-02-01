<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Order;
use App\Models\User;
use App\Models\Notice;
use App\Models\Analytic;
use DataTables;
use Carbon\Carbon;

class AnalyticController extends Controller
{

    /**
    * Handle an AnalyticController
    * @author Galaxy 524
    * @param  \Illuminate\Http\Request $request
    * @return View
    */

    public function index(Request $request)
    {
        $users = User::count();
        $style_orders = Order::where('status', 'Order')->count();
        $active_orders = Order::where('status', 'Active')->count();
        $expiry_orders = Order::where('status', 'Expiryed')->count();
        $cancel_orders = Order::where('status', 'Cancel')->count();
        $expirys = Order::whereDate('expiryed_at', '<=' ,date('Y-m-d'))->where('status', '!=', 'EXPIRYED')->count();
        $today_active_orders = Order::where('status', 'Active')->whereDate('created_at', date('Y-m-d'))->count();
        $today_style_orders = Order::where('status', 'Order')->whereDate('created_at', date('Y-m-d'))->count();
        $today_signin_users = Analytic::where('action', 'SignIn')->whereDate('created_at', date('Y-m-d'))->count();
        $today_signup_users = Analytic::where('action', 'SignUp')->whereDate('created_at', date('Y-m-d'))->count();
        
        return view('admin.analytic.index', [
            'menu' => 'analytic',
            'users' => $users,
            'style_orders' => $style_orders,
            'active_orders' => $active_orders,
            'cancel_orders' => $cancel_orders,
            'expiry_orders' => $expiry_orders,
            'today_style_orders' => $today_style_orders,
            'today_active_orders' => $today_active_orders,
            'today_signin_users' => $today_signin_users,
            'today_signup_users' => $today_signup_users,
            'expirys' => $expirys,
            'styles' => [],
            'today_credit' => [],
        ]);
    }
    public function getanalytic(Request $request)
    {
        $analytics = Analytic::leftJoin('users', 'users.id', '=', 'analytics.userid')
                            ->select([
                                'analytics.*',
                                'users.name',
                                'users.email'
                            ])->get();

        return Datatables::of($analytics)
                          ->addIndexColumn()
                          ->addColumn('datetime', function($analytics){
                              return $analytics->created_at;
                          })
                          ->make(true);
    }
    public function expirylinks(Request $request)
    {
        try {
            $expirys = Order::whereDate('expiryed_at', '<=' ,date('Y-m-d'))->where('status', '!=', 'EXPIRYED')->get();
            foreach($expirys as $expiry){
                $order = Order::find($expiry->id);
                $order->status = "Expiryed";
                $order->view = "Hide";
                $order->save();
            }
            return response(json_encode(['success' => true]));
        } catch (\Throwable $th) {
            return response(json_encode(['success' => false]));
        }
    }
}
