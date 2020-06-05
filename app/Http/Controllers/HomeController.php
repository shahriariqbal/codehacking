<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }


    public function index()
    {
        
        $posts = Post::paginate(10);
        $categories = Category::all();
        return view('front/home', compact('posts', 'categories'));
    }
}
