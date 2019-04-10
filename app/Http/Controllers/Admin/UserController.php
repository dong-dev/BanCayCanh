<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Group;
use Session;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = User::all();
        if ($request->has('keyword')) {
            $keyword = $request->keyword;
            $list = User::where ('name', 'like', '%' .$keyword. '%' )->get();
        }

        
        return view("admin.user.list", ['list' => $list]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate ($request, [
            'name' => 'required']
        );
        $u = new User();
        $u->name= $request->name;
        $u->email= $request->email;
        $u->password = $request->password;
        $u->phone= $request->phone;
        $u->group_id= $request->group_id;
        $u->address= $request->address;
        $u->save();


        Session::flash('success', "Create successfully!!!");
        return redirect("admin/user");
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
        $user = User::findOrFail($id);
        $us = User::pluck ('name', 'id');
        return view('admin.user.edit', [
            'user' => $user,
            'us'=> $us]
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

        $user = User::findOrFail($id);
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password = $request->password;
        $user->phone= $request->phone;
        $user->address= $request->address;
        $user->save();
        Session::flash('success', "Update successfully!!!");
        return redirect("admin/user");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        Session::flash('success', "Delete successfully!!!");
        return redirect("admin/user");
    }
}
