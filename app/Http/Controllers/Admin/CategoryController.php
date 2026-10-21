<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
     public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(15);
        return view('admin.categories.index', compact('categories'));

    }

     public function create()
    {
        return view('admin.categories.create');
    }
      public function store(Request $request)
    {
        Category::create($request->all());
        return redirect()->route('admin.categories.index');
    }
}
