<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;
use App\Models\Blog;


class AdminBlogController extends Controller
{
    public function index(){
       return view('admin.blogs.index', [
        'blogs'=>Blog::latest()->paginate(6)
       ]);
    }

    public function create()
    {
      return view('admin.blogs.create', [
        'categories'=>Category::all()
      ]);
    }

    public function edit(Blog $blog)
    {
      return view('admin.blogs.edit', [
        'blog'=>$blog,
        'categories'=>Category::all()
      ]);
    }

    public function update(Blog $blog)
    {
      $formData=request()->validate([
        'title'=>'required|max:255|min:3',
        'intro'=>['required'],
        'body'=>['required'],
        'slug'=>['required', Rule::unique('blogs','slug')->ignore($blog->id)],
        'category_id'=>['required', Rule::exists('categories', 'id')]
      ]);

      $formData['user_id'] = auth()->id();
      $formData['thumbnail'] = request()->file('thumbnail') ? request()->file('thumbnail')->store('thumbnails'): $blog->thumbnail; //thumbnails folder is auto created

      $blog->update($formData);

      return redirect('/admin/index');
    }

    public function destory(Blog $blog)
    {
           $blog->delete();

           return back();
    }


    public function store()
    {
    
      $formData=request()->validate([
        'title'=>'required|max:255|min:3',
        'intro'=>['required'],
        'body'=>['required'],
        'slug'=>['required', Rule::unique('blogs','slug')],
        'category_id'=>['required', Rule::exists('categories', 'id')]
      ]);

      $formData['user_id'] = auth()->id();
      $formData['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

      Blog::create($formData);

      return redirect('/admin/index');

    }
}
