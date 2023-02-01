<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Order;
use App\Models\Style;
use DataTables;
use Carbon\Carbon;
use App\Models\User;
use App\Traits\AnalyticTrait;

class ShopController extends Controller
{

    /**
    * Handle an ShopController
    * @author Galaxy 524
    * @param  \Illuminate\Http\Request $request
    * @return View
    */

    use AnalyticTrait;

    public function index(Request $request)
    {
        $clients = User::all();
        $styles = Style::where('status', 'Active')->get();

        return view('admin.shop.index', [
            'menu' => 'shop',
            'clients' => $clients,
            'styles' => $styles,
        ]);
    }
    public function getorder(Request $request)
    {
        $orders = Order::leftJoin('users', 'users.id', '=', 'orders.userid')
                        ->leftJoin('styles', 'styles.id', '=', 'orders.styleid')
                        ->select([
                            'users.email',
                            'styles.title as style',
                            'orders.*'
                        ]);

        $user = Auth::user();
        $orders = $orders->get();

        return Datatables::of($orders)
                        ->addIndexColumn()
                        ->addColumn('datetime', function($orders){
                            return date($orders->created_at);
                        })
                        ->rawColumns(['datetime'])
                        ->make(true);
    }
    public function styleorder(Request $request)
    {
        $styleid = $request->styleId;
        $toemail = $request->toEmail;

        $user = Auth::user();

        if ($request->select_user) {
            $user = User::find($request->select_user);
        }

        if (!$toemail) {
            $toemail = $user->email;
        }

        $order = new Order;
        $order->styleid = $styleid;
        $order->userid = $user->id;
        $order->log_email = $toemail;
        $order->expiryed_at = Carbon::now()->addMonths(1);
        $order->save();

        $this->analyticlog('StyleOrder');
        
        return response(json_encode(['success' => true]));
    }
    public function saveorder(Request $request)
    {
        $order = Order::find($request->row);
        $order->expiryed_at = $request->expiry;
        $order->view = $request->view;
        $order->link = $request->link;
        $order->status = $request->status;
        $order->save();
        return response(json_encode(['success' => true]));
    }
    public function deleteorder(Request $request)
    {
        $order = Order::find($request->row_id);
        $order->delete();
        return response(json_encode(['success' => true]));
    }
}
