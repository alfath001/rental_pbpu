<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Upload;
use App\Kendaraan;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\Paginator;

class KendaraanController extends Controller
{

	public function admin()
    {
    	return view('admin');
    }


    /**
     * Show the application ajaxImageUploadPost.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminPost(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'title' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);


      if ($validator->passes()) {


        $input = $request->all();
        $input['image'] = $request->title.'_'.time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['image']);


        Kendaraan::create($input);

        return response()->json(['success'=>'done']);
      }


      return response()->json(['error'=>$validator->errors()->all()]);
    }


    public function viewKendaraan(){
    	$kendaraan = DB::table('kendaraans')->select('id', 'title', 'merk', 'kategori', 'image', 'deskripsi', 'harga', 'status')->orderBy('id', 'desc')->paginate(7);
    	
    	return view('view-admin', ['kendaraans' => $kendaraan]);
    }


}
