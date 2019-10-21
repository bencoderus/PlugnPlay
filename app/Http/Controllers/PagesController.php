<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Music;
use App\Album;
use App\Event;
use App\User;


class PagesController extends Controller
{

    //Welcome Page
    public function index(){
        $albums = Album::orderBy('id', 'DESC')->take(6)->get();
        $musics = Music::orderBy('id', 'DESC')->take(6)->get();
        $events = Event::orderBy('id', 'DESC')->take(6)->get();
        $latest = Music::all()->last();
        return view('welcome', compact('albums', 'musics', 'events', 'latest'));
    }


    //Music
    public function music(){
        $songs = Music::paginate('15');

        return view('music.index', compact('songs'));
    }

    public function showmusic($slug){
        $song = Music::where('slug', $slug)->firstOrFail();
        //Hints
        $song->views+=1;
        $song->save();
        $musics = Music::orderBy('id', 'DESC')->take(5)->where('id', '!=', $song->id)->get();
        return view('music.show', compact('song', 'musics'));
    }


    //Album
    public function album(){
        $albums = Album::paginate('15');
        return view('album.index', compact('albums'));
    }

    public function showalbum($id){
        $album = Album::where('slug', $id)->firstOrFail();
        return view('album.show', compact('album'));
    }


    //Event
    public function events(){
        $events = Event::paginate(15);
        return view('event.index', compact('events'));
    }

}
