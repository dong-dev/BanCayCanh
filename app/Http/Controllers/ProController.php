<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Cart;
use App\Product_detail;
use Session;

class ProController extends Controller
{
	public function getProduct($id)
    {
    	$pro = Product::where('category_id', $id)->get();
        return view('product', ['pro' => $pro]);

    }

    public function getdetailPro($id)
    {
        $viewed = Session::has('viewed') ? Session::get('viewed') : [];
        if (!in_array($id, $viewed)) {
            $viewed[] = $id;
            Session::put('viewed', $viewed);
    }

        $product = Product::find($id);
        // foreach (Cart::content() as $item) {
        //     $oDetail->quantity = $item->qty;
        // }
    	return view('product_detail', ['product'=>$product]);
    }

    public function getEditor($id)
    {

        $product = Product::findOrFail($id);

        $list = Category::pluck('name', 'id');
        return view('admin.pro_detail.list', [
            'product' => $product,
            'list'=> $list]
        );

    }

    public function updateQty(Request $request) 
    {
        if (isset($request->row_id)) {
            Cart::update($request->row_id, ['qty' => $request->qty]);
            Session::flash('success', 'Cap nhat gio hang thanh cong !!!');
        }

        return redirect('product_detail');
    }
}
