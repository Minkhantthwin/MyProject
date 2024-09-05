<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;



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
      return view('blogs.create');
    }
    }

