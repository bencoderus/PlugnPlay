<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {

    }

    public function music(){

    }
    public function event(){
    return view('admin.event');
    }
    public function addevent(Request $request){
    $this->validate($request, [
    'title'=>'required',
    'location'=>'required',
    'content'=>'required',
    'date'=>'required',
    'image'=>'required|image|max:2000',
    ]);
    return ['message'=>'Saved successfully'];
    }
}
