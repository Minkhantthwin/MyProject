<x-layout>
    <x-slot name="title">
         <title>Category</title>
    </x-slot>
    <x-slot name="content">
@foreach ($categories as $blog)

<h1><a href="blogs/{{$blog->slug}}">{{$blog->title}}</a></h1>
<p>
   {{$blog->category->category_name}}
</p>
<div>
    <p>Published at: {{$blog->created_at->diffForHumans()}} </p>
</div>
<div>  
    {{$blog->intro}}
</div>
 @endforeach
 <br>
 <a href="/index">GO Back</a>     
    </x-slot>
</x-layout>


  
