<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Album;
use App\Music;
use Illuminate\Support\Str;
use App\User;
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

    public function deletealbum(Request $request){
        $album = Album::find($request->input('id'));
        $album->delete();

        //remove music in this category
$music = Music::where('album_id', $request->input('id'))->get();
foreach($music as $music)
{
$music->album_id = 0;
$music->save();
}

        return ['message'=>'success'];
    }

    public function editalbum(Request $request){
        $this->validate($request, [
            'name'=>'required',
            'content'=>'required',
            'year'=>'required',
            'image'=>'sometimes|image|max:2000',
            ]);

#Uploading album file
if($request->hasFile('image')){
    $file = $request->file('image');
    $ext =$file->getClientOriginalExtension();
    $filename = 'art' .time() .'.' .$ext;
    $destination = public_path("images/albums");
    $file->move($destination ,$filename);
    }

            $album = Album::find($request->input('id'));
            $album->name = $request->input('name');
            $album->content = $request->input('content');
            $album->year = $request->input('year');
            if($request->hasFile('image')){
                $album->image = $filename;
            }
            $album->save();
            return ['message'=>'success'];
    }



    public function addalbum(Request $request){
        $this->validate($request, [
            'name'=>'required|unique:albums',
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
            $album->name = $request->input('name');
            $album->content = $request->input('content');
            $album->year = $request->input('year');
            $album->image = $filename;
            $album->save();
            return ['message'=>'success'];
    }


    //Events
    public function event(){
    $events= Event::all();
    return view('admin.event', compact('events'));
    }

    //Delete Evenet
    public function deleteevent(Request $request){
        $event = Event::find($request->input('id'));
        $event->delete();
        return ['message'=>'success'];
    }

//Edit Event
    public function editevent(Request $request){
        $this->validate($request, [
        'title'=>'required',
        'id'=>'required',
        'location'=>'required',
        'content'=>'required',
        'date'=>'required',
        'time'=>'required',
        'image'=>'sometimes|image|max:2000',
        ]);
    //Uploading event file
    if($request->hasFile('image')){
    $file = $request->file('image');
    $ext =$file->getClientOriginalExtension();
    $filename = 'event' .time() .'.' .$ext;
    $destination = public_path("images/event");
    $file->move($destination ,$filename);
    }

    $event = Event::find($request->input('id'));
    $event->title = $request->input('title');
    $event->location = $request->input('location');
    $event->description = $request->input('content');
    $event->date = $request->input('date');
    $event->time = $request->input('time');
    if($request->hasFile('image')){
        $event->image = $filename;
    }
    $event->save();
        }
    //end events


//Add event
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
$destination = public_path("images/event");
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

public function deletemusic(Request $request){
    $music = Music::find($request->input('id'));
    $music->delete();
    return ['message'=>'success'];
}

//add music
public function editmusic(Request $request){
    $this->validate($request, [
    'title'=>'required',
    'song'=>'required',
    'album'=>'required',
    'year'=>'required',
    'id' =>'required',
    'content'=>'required',
    'song'=>'sometimes|min:1000|mimes:mp3,mpga',
    'image'=>'sometimes|image|max:2000',
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
    $music = Music::find($request->input('id'));
    $music->title = $request->input('title');
    $music->content = $request->input('content');
    if($request->hasFile('image')){
    $music->image = $img;
    }
    $music->artist = "Taliban";
    if($request->hasFile('song')){
    $music->song = $filename;
    }
    $music->year = $request->input('year');
    $music->album_id = $request->input('album');
    $music->save();
    return ['message'=>'success'];
}


//add music
public function addmusic(Request $request){
    $this->validate($request, [
    'title'=>'required',
    'song'=>'required',
    'album'=>'required',
    'year'=>'required',
    'content'=>'required',
    'song'=>'required|min:1000|mimes:mp3,mpga',
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

public function user(){
$users = User::all();
return view('admin.user', compact('users'));
}


//end of class
}
