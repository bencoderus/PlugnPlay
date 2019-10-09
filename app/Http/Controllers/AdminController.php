<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class AdminController extends Controller
{
    //
    public function __construct()
    {

    }

    public function music(){

    }
    public function event(){
    $events= Event::all();
    return view('admin.event', compact('events'));
    }
    public function addevent(Request $request){
    $this->validate($request, [
    'title'=>'required',
    'location'=>'required',
    'content'=>'required',
    'date'=>'required',
    'time'=>'required',
    'image'=>'required|image|max:2000',
    ]);
//Uploading event file
if($request->hasFile('image')){
$file = $request->file('image');
$ext =$file->getClientOriginalExtension();
$filename = 'event' .time() .'.' .$ext;
$destination = public_path("images/events");
$file->move($destination ,$filename);
}

$event = new Event;
$event->title = $request->input('title');
$event->location = $request->input('location');
$event->description = $request->input('content');
$event->date = $request->input('date');
$event->time = $request->input('time');
$event->image = $filename;
$event->save();


    }
}
