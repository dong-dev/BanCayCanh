<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Session;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $list = Product::select('*');

        if ($request->has('keyword')) {
            $keyword = $request->keyword;
            $list = $list->where('name', 'like', '%' .$keyword. '%');
        }

        $list = $list->orderBy('id', 'DESC')->paginate(5);

        return view("admin.product.list", ['list' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list2 = Category::pluck('name', 'id')->toArray();
        $list['0'] = 'Select Category';
        $list += $list2;
        return view('admin.product.create', ['list'=>$list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate ($request, [
            'name' => 'required',
            'price' => 'required|numeric']
        );

        $fileName = '';
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $fileName=$file->getClientOriginalName();
            $dir = public_path('uploads/products');
            $file->move($dir, $fileName);
        }

        $p = new Product();
        $p->category_id= $request->category_id;
        $p->name= $request->name;
        $p->price= $request->price;
        $p->sale = $request->sale;
        $p->thumbnail = $fileName;
        $p->description = $request->description;
        $p->tag = $request->tag;
        $p->status= $request->status;
        $p->save();
        Session::flash('success', "Create successfully!!!");
        return redirect("admin/product");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $product = Product::findOrFail($id)->toArray();

        $list = Category::pluck('name', 'id');
        
        return view('admin.product.edit', [
            'product' => $product,
            'list'=> $list ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric']
        );

        $product = Product::findOrFail($id);
        $product->category_id= $request->category_id;
        $product->name= $request->name;
        $product->price= $request->price;
        $product->sale= $request->sale;
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $fileName=$file->getClientOriginalName();
            $dir = public_path('uploads/products');
            $file->move($dir, $fileName);
            $product->thumbnail = $fileName;
        }
        $product->description = $request->description;
        $product->tag = $request->tag;
        $product->save();
        Session::flash('success', "Update successfully!!!");
        return redirect("admin/product");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        Session::flash('success', "Delete successfully!!!");
        return redirect("admin/product");
    }
}
