
<x-layout>
    <x-navbar/>

    <!-- singloe blog section -->
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <img
            src="/storage/{{$blog->thumbnail}}"
            class="card-img-top"
            alt="..."
          />
          <h3 class="my-3">{{$blog->title}}</h3>
          <div>Author -  <a href="/users/{{$blog->author->username}}">{{$blog->author->name}}</a></div>
          <div> <a href="/categories/{{$blog->category->slug}}"><span class="badge bg-primary">{{$blog->category->category_name}}</span></a> </div>
          <div class="text-secondary">{{$blog->created_at->diffForHumans()}}</div>
          <div class="text-secondary">
            <form action="/blogs/{{$blog->slug}}/subscription" method="POST">
              @csrf
             @auth
             @if (auth()->user()->isSubscribed($blog))
              <button class="btn btn-danger">Unsubscribe</button>
              @else
              <button class="btn btn-warning">Subscribe</button>
              @endif
             @endauth
               
            </form>
            
          </div>
          <p class="lh-md">
           {!!$blog->body!!}
          </p>
        </div>
      </div>
    </div>
            @auth
            <x-comment-box :blog="$blog" />
            @endauth
            
            @if ($blog->comments->count())
            <x-comments :comments="$blog->comments()->latest()->paginate(3)"/> 
            @endif
            
            
            <x-blog_you_may_like :randomBlogs="$randomBlogs"/>
             
</x-layout>







   
  