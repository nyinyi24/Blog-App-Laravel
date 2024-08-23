<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        //conditional query
        //latest = orderBy('created_at','desc')

        return view('blogs.index', [
            'blogs' => Blog::latest()
                    ->filter(request(['search', 'category_id', 'user_id']))
                    ->paginate(5),
            'users' => User::all(),
            'categories' => Category::all()
        ]);
    }

    public function show(Blog $blog) //Blog::find(2)
    {
        return view('blogs.show', [
            'blog' => $blog
        ]);
        // $blogs = Blog::all();  //refactoring
        // return $blogs;
    }
}
