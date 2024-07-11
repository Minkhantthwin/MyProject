@props(['blog'])

<section class="container">
    <div class="col-md-8 mx-auto">
    @auth
    <x-card-wrapper>
    <form action="/blogs/{{$blog->slug}}/comments" method="POST">
      @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Comment Here</label>
      <textarea class="form-control" rows="5" name="body" id="" required></textarea>
       <x-error name="body"/>
    </div>
   <div class="d-flex justify-content-end"><button type="submit" class="btn btn-primary">Submit</button></div>
    
  </form> 
    </x-card-wrapper>
    @endauth            
    </div>
</section>