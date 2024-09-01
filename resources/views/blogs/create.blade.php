
<x-layout>
<x-navbar/>
<div class="container">
    <div class="row"></div>
    <x-card-wrapper>
    <h3 class="my-3 text-center">Blog Create Form</h3>
    <form action="/admin/blogs/store" method="post">
              @csrf
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" value="{{old('title')}}" required>
                  @error('title')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="intro" class="form-label">Intro</label>
                  <input type="text" class="form-control" id="intro" name="intro" value="{{old('intro')}}" required>
                  @error('intro')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="body" class="form-label">Body</label>
                  <textarea type="text" class="form-control" id="body" name="body" value="{{old('body')}}" required></textarea>
                  @error('body')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug')}}" required>
                  @error('slug')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="thumbnail" class="form-label">Thumbnail</label>
                  <input type="file" class="form-control" id="thumbnail" name="thumbnail" value="{{old('thumbnail')}}" required>
                  @error('thumbnail')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                 <div class="mb-3">
                  <label for="cat" class="form-label">Category</label>
                    <select class="form-control" name="category_id" id="cat">
                      @foreach ($categories as $category)
                      <option {{$category->id==old('category_id') ? 'selected':''}} value="{{$category->id}}">{{$category->category_name}}</option>
                      @endforeach
                    </select>
                 </div>
                <button type="submit" class="btn btn-primary">Create</button>
              </form>
    </x-card-wrapper>
    </div>
    </div>
</x-layout>