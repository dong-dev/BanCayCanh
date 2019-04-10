<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use DB;
class Product_detailController extends Controller
{
    public function getEditor($id)
    {

    	$pro= Product_detail::where('product_id',$id)->get();
        return view('admin.pro_detail.list', ['pro' => $pro]);

    }
    
}
