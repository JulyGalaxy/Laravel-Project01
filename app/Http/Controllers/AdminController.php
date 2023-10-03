<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Blog;
use App\Models\Category;
use App\View\Components\category as ComponentsCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.blogs.index',[
            'blogs' => Blog::latest()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.blogs.create',[
            'categories' => Category::all()
        ]);
    }

    public function store(PostRequest $request)
    {
        $cleanData = $request->validated();
        $cleanData['user_id'] = auth()->id();
        $cleanData['photo'] = request()->file('photo')->store('/images');
        Blog::create($cleanData);
        return redirect()->route('admin.dashboard');

    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit',[
            'blog' => $blog,
            'categories' => Category::all()
        ]);//autofill edit form
    }

    public function update(PostRequest $request,Blog $blog)
    {
        $cleanData = $request->validated();
        $blog->update($cleanData);
        return redirect()->route('admin.dashboard');

    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return back();
    }
}
