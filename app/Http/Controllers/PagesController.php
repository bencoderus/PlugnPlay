<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Music;
use App\Album;
use App\Event;
use App\User;


class PagesController extends Controller
{

    #Homepage
    public function index(){
        $albums = Album::orderBy('id', 'DESC')->take(6)->get();
        $musics = Music::orderBy('id', 'DESC')->take(6)->get();
        $events = Event::orderBy('id', 'DESC')->take(6)->get();
        $latest = Music::all()->last();
        return view('welcome', compact('albums', 'musics', 'events', 'latest'));
    }

}
