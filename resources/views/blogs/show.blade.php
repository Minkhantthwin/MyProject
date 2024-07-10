
<x-layout>
    <x-navbar/>

    <!-- singloe blog section -->
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <img
            src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
            class="card-img-top"
            alt="..."
          />
          <h3 class="my-3">{{$blog->title}}</h3>
          <div>Author -  <a href="/users/{{$blog->author->username}}">{{$blog->author->name}}</a></div>
          <div> <a href="/categories/{{$blog->category->slug}}"><span class="badge bg-primary">{{$blog->category->category_name}}</span></a> </div>
          <div class="text-secondary">{{$blog->created_at->diffForHumans()}}</div>
          <p class="lh-md">
           {{$blog->body}}
          </p>
        </div>
      </div>
    </div>
    
    <section class="container">
            <div class="col-md-8 mx-auto">
            @auth
            <x-card-wrapper>
            <form action="/blogs/{{$blog->slug}}/comments" method="POST">
              @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Comment Here</label>
              <textarea class="form-control" rows="5" name="body" id=""></textarea>
              @error('body')
                    <p class="text-danger">{{$message}}</p>
              @enderror
            </div>
           <div class="d-flex justify-content-end"><button type="submit" class="btn btn-primary">Submit</button></div>
            
          </form> 
            </x-card-wrapper>
            @endauth            
            </div>
      </section>
    
    
            <x-comments :comments="$blog->comments"/> 
            <x-subscribe/>
            <x-blog_you_may_like :randomBlogs="$randomBlogs"/>
             
</x-layout>







   
  