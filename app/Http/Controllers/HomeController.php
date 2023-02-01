<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\Order;
use App\Models\Style;
use Auth;
use DataTables;
use Carbon\Carbon;
use App\Traits\AnalyticTrait;

class HomeController extends Controller
{
    /**
    * Handle an HomeController
    * @author Galaxy
    * @param  \Illuminate\Http\Request $request
    * @return View
    */

    use AnalyticTrait;

    public function index(Request $request)
    {   
        $notices = Notice::get();
        $styles = Style::get();
        $plans = Notice::where('type', 'Plan')->first();

        return view('user.home.index', [
            'menu' => 'home',
            'notices' => $notices,
            'plan' => $plans,
            'styles' => $styles,
        ]);
    }
    public function getorder(Request $request)
    {
        $auth = Auth::user();

        $orders = Order::leftJoin('styles', 'styles.id', '=', 'orders.styleid')
                        ->where('userid', $auth->id)
                        ->select([
                            'styles.title',
                            'styles.price',
                            'orders.*'
                        ])
                        ->get();

        return DataTables::of($orders)
                        ->addIndexColumn()
                        ->addColumn('create', function($orders){
                            return $orders->created_at;
                        })
                        ->make(true);
    }
    public function addorder(Request $request)
    {
        $styleid = $request->idx;

        $user = Auth::user();

        $order = new Order;
        $order->styleid = $styleid;
        $order->userid = $user->id;
        $order->log_email = $user->email;
        $order->expiryed_at = Carbon::now()->addMonths(1);
        $order->save();

        $this->analyticlog('StyleOrder');
        
        return response(json_encode(['success' => true]));
    }
}
