<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $posts = Post::all();
        $featured = Post::latest()->first();
        $categories = Category::all();
        return view('front.index',compact('posts','featured','categories'));
    }

   
     public function detail($id)
    {
    $post = Post::findOrFail($id);
    $categories = Category::all();
    return view('front.detail', compact('post'));
    }


}
