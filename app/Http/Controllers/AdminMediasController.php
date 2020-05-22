<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Photo;

class AdminMediasController extends Controller
{
    public function index(){
        $photos = Photo::all();
        return view('admin.media.index', compact('photos'));
    }

    public function create(){
        
        return view('admin.media.create');
    }
}
