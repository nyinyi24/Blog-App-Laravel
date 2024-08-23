<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::latest()->paginate(8)
        ]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        $category = new Category();
        $category->name = request('name');
        $category->slug = request('slug');
        $category->save();

        return redirect('/admin/categorylist');
    }
    
    public function destory(Category $category)
    {
        $category->delete();

        return back();
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    public function update(Category $category)
    {
        request()->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        $category->name = request('name');
        $category->slug = request('slug');
        $category->save();

        return redirect('/admin/categorylist');
    }
}
