<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Product_detail;
use Session;
use Auth;
//use GuzzleHttp\Psr7\Request;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth',['except' => 'getLogout']);
    }

    /**[]
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    // public function index()
    // {
    //     $viewedId = Session::has('viewed') ? Session::get('viewed') : [];
    //     $productViewed = null;
    //     if(isset($viewedId)) {
    //         $productViewed = Product::whereIn('id', $viewedId)->get();
    //     }

    //     $productDeal = Product::all();
    //     $lastest = Product::orderBy('id', 'DESC')->paginate(5);

    //     return view('home', [
    //         'productDeal' => $productDeal, 
    //         'productViewed' => $productViewed, 
    //         'lastest' => $lastest
    //     ]);
    // }
    
    public function index(Request $request)
    {
        $viewedId = Session::has('viewed') ? $request->session()->get('viewed') : [];
        $productViewed = null;
        if (isset($viewedId)) {
            $productViewed = Product::whereIn('id', $viewedId)->get();
        }

        $productDeal = Product::all();
        $lastest = Product::orderBy('id', 'DESC')->paginate(5);

        return view ('home', [
            'productDeal' => $productDeal, 
            'productViewed' => $productViewed, 
            'lastest' => $lastest ]
        );
    }

    public function search (Request $request)
    {
        $pro = Product::select('*');
        if ($request->has('keyword')) {
            $keyword = $request->keyword;
            $pro = $pro->where ('name', 'like', '%' .$keyword. '%' );
        }
        $pro = $pro->get();
    	return view('product', ['pro'=>$pro]);
    }

    
}
