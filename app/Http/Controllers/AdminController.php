<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'blogs' => Blog::latest()->paginate(5)
        ]);
    }

    public function create()
    {
        return view('admin.create' , [
            'categories' => Category::all()
        ]);
    }

    public function store()
    {
        request()->validate([
            'photo' => ['required' , 'image'],
            'title' => ['required'],
            'slug' => ['required'],
            'body' => ['required'],
            'category_id' => ['required' , Rule::exists('categories' , 'id')]
        ]);

        //data store
        $blog = new Blog();
        $blog->title = request('title');
        $blog->slug = request('slug');
        $blog->body = request('body');
        $blog->category_id = request('category_id');
        $blog->user_id = auth()->id();
        $blog->photo = '/' . request('photo')->store('/blogs' , 'public');
        $blog->save();

        return redirect('/admin');
    }

    public function edit(Blog $blog)
    {
        return view('admin.edit', [
            'categories' => Category::all(),
            'blog' => $blog
        ]);
    }

    public function update(Blog $blog)
    {
        request()->validate([
            'photo' => ['nullable' , 'image'],
            'title' => ['required'],
            'slug' => ['required'],
            'body' => ['required'],
            'category_id' => ['required' , Rule::exists('categories' , 'id')]
        ]);

        $blog->title = request('title');
        $blog->slug = request('slug');
        $blog->body = request('body');
        $blog->category_id = request('category_id');
        $blog->user_id = auth()->id();
        if(request('photo')){
        
        //remove old photo
        $path = public_path('storage' . $blog->photo);
        if($blog->photo && File::exists($path)){
            File::delete($path);
        }
        
        //upload new photo
        $blog->photo = '/' . request('photo')->store('/blogs' , 'public');
        }
        $blog->save();

        return redirect('/admin');
    }

    public function destory(Blog $blog)
    {

        $path = public_path('storage' . $blog->photo);
        if($blog->photo && File::exists($path)){
            File::delete($path);
        }
        $blog->delete();
        
        return back();
    }
}
