<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Album;
use App\Music;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    //
    public function __construct()
    {

    }
//Album
    public function album(){
$albums = Album::orderBy('id', 'DESC')->get();
return view('admin.album', compact('albums'));
    }

    public function addalbum(Request $request){
        $this->validate($request, [
            'title'=>'required|exists:albums',
            'content'=>'required',
            'year'=>'required',
            'image'=>'required|image|max:2000',
            ]);

//Uploading album file
if($request->hasFile('image')){
    $file = $request->file('image');
    $ext =$file->getClientOriginalExtension();
    $filename = 'art' .time() .'.' .$ext;
    $destination = public_path("images/albums");
    $file->move($destination ,$filename);
    }

            $album = new Album;
            $album->name = $request->input('title');
            $album->content = $request->input('content');
            $album->year = $request->input('year');
            $album->image = $filename;
            $album->save();
            return ['message'=>'success'];
    }
    //End Album

    //Events
    public function event(){
    $events= Event::all();
    return view('admin.event', compact('events'));
    }

    public function deleteevent(Request $request){
        $event = Event::find($request->input('id'));
        $event->delete();
        return ['message'=>'success'];
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
$destination = public_path("images/albumart");
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
//end events

//music
public function music(){
    $albums= Album::all();
    $musics = Music::orderBy('id', 'DESC')->get();
    return view('admin.music', compact('musics', 'albums'));
}


public function addmusic(Request $request){
    $this->validate($request, [
    'title'=>'required',
    'song'=>'required',
    'album'=>'required',
    'year'=>'required',
    'content'=>'required',
    'song'=>'required|min:1000',
    'image'=>'required|image|max:2000',
    ]);
//Uploading music album art
if($request->hasFile('image')){
$file = $request->file('image');
$ext =$file->getClientOriginalExtension();
$img = 'art' .time() .'.' .$ext;
$destination = public_path("images/albumart");
$file->move($destination ,$img);
}

//Uploading music album art
if($request->hasFile('song')){
    $file = $request->file('song');
    $ext =$file->getClientOriginalExtension();
    $songname= Str::slug($request->input('title'));
    $filename = $songname .'.' .$ext;
    $destination = public_path("songs");
    $file->move($destination ,$filename);
    }

    $music = new Music;
    $music->title = $request->input('title');
    $music->content = $request->input('content');
    $music->image = $img;
    $music->artist = "Taliban";
    $music->song = $filename;
    $music->year = $request->input('year');
    $music->album_id = $request->input('album');
    $music->save();
    return ['message'=>'success'];
}




//end of class
}
