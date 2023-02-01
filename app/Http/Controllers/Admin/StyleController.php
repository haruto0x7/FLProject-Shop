<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Style;
use DataTables;
use Validator;

class StyleController extends Controller
{
    /**
    * Handle an StyleController
    * @author Galaxy
    * @param  \Illuminate\Http\Request $request
    * @return View
    */

    public function index(Request $request)
    {
        return view('admin.style.index', [
            'menu' => 'style',
        ]);
    }

    public function getstyle(Request $request)
    {
        $styles = Style::get();
        return Datatables::of($styles)
                        ->addIndexColumn()
                        ->make(true);
    }
    public function addstyle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'style_title' => 'required',
            'style_prices' => 'required|numeric',
            'style_comment' => 'required',
        ]);

        if($validator->fails()){
            return response(json_encode(['validation' => false]));
        }

        $style  = new Style;
        $style->title = $request->style_title;
        $style->price = $request->style_prices;
        $style->status = $request->style_status;
        $style->youtube_url = $request->style_youtube_url;
        $style->comment = $request->style_comment;
        $style->save();
        return response(json_encode(['success' => true]));
    }
    public function editstyle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_style_title' => 'required',
            'edit_style_prices' => 'required | numeric',
            'edit_style_comment' => 'required',
        ]);

        if($validator->fails()){
            return response(json_encode(['validation' => false]));
        }

        $style  = Style::find($request->edit_style_id);
        $style->title = $request->edit_style_title;
        $style->price = $request->edit_style_prices;
        $style->status = $request->edit_style_status;
        $style->youtube_url = $request->edit_style_youtube_url;
        $style->comment = $request->edit_style_comment;
        $style->save();
        return response(json_encode(['success' => true]));
    }
    public function deletestyle(Request $request)
    {
        Style::find($request->row_id)->delete();
        return response(json_encode(['success' => true]));
    }
}
