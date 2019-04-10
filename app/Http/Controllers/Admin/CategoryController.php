<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use Session;
use DB;
use DateTime;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Category::all();
        $pr = Category::pluck('name', 'id')->toArray();
        $listPR['0'] ='';
        $listPR += $pr;
        return view('admin.category.list', ['listCategory' => $list, 'listPR' => $listPR]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        $list2 = Category::pluck('name', 'id')->toArray();
        $list['0'] ='Select Parent Category';
        $list += $list2;
        return view('admin.category.create', ['list' => $list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parent_id = $request->parent_id;
        $name = $request->name;
        // $slug = $request->slug;
        $cate = new category();
        $cate->parent_id = $request->parent_id;
        $cate->name = $name;
        $cate->slug = $name;
        $cate->save();

        Session::flash('success', 'Create Successfully');
        return redirect('admin/category');
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
        $category = Category::findOrFail($id)->toArray();
        $list = Category::pluck('name', 'id');
        return view ("admin.category.edit", [
            'category' => $category,
            'list'=> $list]
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
        $this -> validate ($request, [
            'name' => 'required'] 
        );

        $category = Category::findOrFail($id);
    
        $category->name= $request->name;
        $category->parent_id = $request->parent_id;
        $category->updated_at = new DateTime;
        $category->save(); 
           
        Session::flash('success', "Update successfully!!!");
        return redirect("admin/category");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checkParent = Category::where('parent_id', $id)->count();
        $category = Category::findOrFail($id);
        if ($checkParent > 0 || $category->product->count() > 0) {
            Session::flash('error', "Bạn Không Thể Xóa !!");
        } else {
            $category->delete();
            Session::flash('success', "Delete successfully!!!");
        }

        return redirect('admin/category');

    }
}
