<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    /**
    * Handle an CreditController
    * @author Galaxy 524
    * @param  \Illuminate\Http\Request $request
    * @return View
    */

    public function index(Request $request)
    {

        return view('admin.credit.index', [
            'menu' => 'credit',
            'credits' => []
        ]);
    }
}
