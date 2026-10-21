<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // Display all posts
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(15);

        return view('admin.posts.index', compact('posts'));
    }

    // Show create post form
    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        return view('admin.posts.create', compact('categories','users'));
    }



    // Store new post
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'user_id' => 'required|exists:users,id',
            'description' => 'nullable|string',
        ]);

        // Upload image
        $imagePath = $request->file('image')
            ->store('posts', 'public');

        // Save post
        Post::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'image' => $imagePath,
             'user_id' => $request->user_id,
            'description' => $request->description,
        ]);

        // Redirect to posts index
        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Post created successfully!');
    }

    // Show a single post
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

     public function edit(string $id)
    {
        $post = Post::find($id);
        $categories = Category::all();
         $users = User::all();
        return view('admin.posts.edit',compact('post','categories','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request);
        $post = Post::find($id);
        $post->update($request->all());

        
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
 public function destroy(string $id)
{
    $post = Post::find($id);
    $post->delete();
    return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully!');
}
   
    
}