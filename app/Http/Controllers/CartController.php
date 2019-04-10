<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Order_detail;
use App\Order;
use Cart;
use Session;
use Auth;
use DB;
class CartController extends Controller
{
    public function index() 
    {
        $list = Cart::content();
        // dd($list);
        return view('cart.list', ['list' => $list]);
    }

    public function add($id) 
    {
        $product = Product::findOrFail($id);
        $cartInfo = [
            'id' => $id,
            'name' => $product->name,
            'price' => $product->sale,
            'qty' => 1,
            'options' => ['thumbnail' => $product->thumbnail, 'original_price' => $product->price]
        ];
        Cart::add($cartInfo);

        Session::flash('success', 'Da them moi san pham "'.$product->name.'" vao gio hang!!!');
        
        //echo "SL: " . Cart::count();
        return redirect()->back();
    }


    public function remove($id) 
    {
        foreach (Cart::content() as $rowId => $item) {
            if ($item->id == $id) {
                Cart::remove($rowId);
                break;
            }
        }

        return redirect()->back();
    }

    public function destroy() 
    {
        Cart::destroy();
        return redirect()->back();
    }

    public function checkout(Request $request) 
    {
        
        return view('cart.checkout');
    }

    


    public function order(Request $request) 
    {
        $user_id = 15;
        if (Auth::check()) {
            $user_id = Auth::user()->id;
        }

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|numeric',
            'address'=>'required'
        
        ],[
            'name.required'=>'Bạn chưa nhập tên',
            'phone.required'=>'Bạn chưa nhập sđt',
            'phone.numeric'=>'Đây không phải là số điện thoại',
            'address.required'=>'Bạn chưa nhập địa chỉ'
        ]);
        
        $ord = new Order();
        $ord->user_id = $user_id;
        $ord->name = $request->name;
        $ord->address = $request->address;
        $ord->phone = $request->phone;
        $ord->mail = $request->mail;
        $ord->total = 0;
        $ord->status = 0;
        $ord->type = $request->type;
        $ord->save();

        $total = 0;
       
        foreach (Cart::content() as $item) {
            $oDetail = new Order_detail();
            $oDetail->order_id = $ord->id;
            $oDetail->product_id = $item->id;
            $oDetail->quantity = $item->qty;
            $oDetail->price = $item->price;
            $oDetail->save();
            $total += $item->qty * $item->price;
            
        }
        $ord->total = $total;
       
        $ord->save();
        Cart::destroy();
        Session::flash('success', 'Bạn đã đặt hàng thành công !!!');
        return redirect()->route('checkStatus');
    
    }

    public function checkStatus() 
    {
        $order = DB::table('orders') -> orderBy('id', 'desc')->first();
        return view('cart.waitcheck', ['order' => $order]);
    }



    public function success() 
    {
        return "dat hang thanh cong!!!!";
    }

    public function update(Request $request, $id) 
    {
        $oDetatil = new Order_detail();
        
    }

    public function updateQty(Request $request) 
    {
        if (isset($request->row_id)) {
            Cart::update($request->row_id, ['qty' => $request->qty]);
            Session::flash('success', 'Cap nhat gio hang thanh cong !!!');
        }

        return redirect('cart/list');
    }
    
}
