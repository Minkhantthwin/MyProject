{{-- <x-layout>
    <x-slot name="title">
         <title>All-Blog</title>
    </x-slot>
    <x-slot name="content">
@foreach ($blogs as $blog)

<h1><a href="blogs/{{$blog->slug}}">{{$blog->title}}</a></h1>

<h4>Author - <a href="/users/{{$blog->author->username}}">{{$blog->author->name}}</a> </h4>

<p>
    <a href="/categories/{{$blog->category->slug}}">{{$blog->category->category_name}}</a>
</p>
<div>
    <p>Published at: {{$blog->created_at->diffForHumans()}} </p>
</div>
<div>  
    {{$blog->intro}}
</div>
 @endforeach 
    </x-slot>
</x-layout> --}}

<x-layout>

    <x-navbar/>

    <x-hero/>
       
    <x-blogs-section :blogs="$blogs"/>
                     

   <x-subscribe/>

</x-layout>

    


  
