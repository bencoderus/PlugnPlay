<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    #Homepage
    public function index(){
        // toastr()->success('My name is Inigo Montoya. You killed my father, prepare to die!');
        return view('welcome');
    }
}
