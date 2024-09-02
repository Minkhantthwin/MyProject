<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Validation\Rule;


class BlogController extends Controller
{
   public function index () {
            
        return view('blogs.index' ,
        ['blogs'=> Blog::latest()
                       ->filter(request(['search','category','username']))
                       ->paginate(6)
                       ->withQueryString() //pagination connect
         
    ]);    
    }
    public function show (Blog $blog) {

        return view('blogs.show', [
            'blog'=>$blog,
            'randomBlogs'=>Blog::inRandomOrder()->take(3)->get() //Random Method
        ]);       
    }

    public function subscriptionHandler(Blog $blog)
    {
       if(auth()->user()->isSubscribed($blog))
       {
         $blog->unSubscribed();
       } 
       else 
       {
        $blog->subscribed();
       }

       return back();
    }

    public function create()
    {
      return view('blogs.create', [
        'categories'=>Category::all()
      ]);
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

      return redirect('/index');

    }

 
    }

