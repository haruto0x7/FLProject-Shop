<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Notice;
use DataTables;
use Validator;

class InformationController extends Controller
{
    /**
    * Handle an InformationController
    * @author Galaxy 524
    * @param  \Illuminate\Http\Request $request
    * @return View
    */

    public function index(Request $request)
    {   
        return view('admin.information.index', [
            'menu' => 'information'
        ]);
    }
    public function getinfo(Request $request)
    {
        $notices = Notice::get();
        return Datatables::of($notices)
                        ->addIndexColumn()
                        ->addColumn('title', function($notices){
                            return Str::limit($notices->title, 50 );
                        })
                        ->addColumn('create', function($notices){
                            return $notices->created_at;
                        })
                        ->addColumn('update', function($notices){
                            return $notices->updated_at;
                        })
                        ->make(true);
    }
    public function addinfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'info_title' => 'required',
            'info_content' => 'required',
            'info_type' => 'required',
        ]);

        if($validator->fails()){
            return response(json_encode(['validation' => false]));
        }

        $notice  = new Notice;
        $notice->title = $request->info_title;
        $notice->content = $request->info_content;
        $notice->type = $request->info_type;
        $notice->prices = $request->info_prices;
        $notice->save();
        return response(json_encode(['success' => true]));
    }
    public function editinfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_info_id' => 'required',
            'edit_info_title' => 'required',
            'edit_info_content' => 'required',
            'edit_info_type' => 'required',
        ]);

        if($validator->fails()){
            return response(json_encode(['validation' => false]));
        }

        $notice  = Notice::find($request->edit_info_id);
        $notice->title = $request->edit_info_title;
        $notice->content = $request->edit_info_content;
        $notice->type = $request->edit_info_type;
        $notice->save();
        return response(json_encode(['success' => true]));
    }
    public function getrowinfo(Request $request)
    {
        $rownotice = Notice::find($request->row_id);
        return response(json_encode(['success' => true, 'result' => $rownotice]));
    }
    public function deleteinfo(Request $request)
    {
        Notice::find($request->row_id)->delete();
        return response(json_encode(['success' => true]));
    }
}
