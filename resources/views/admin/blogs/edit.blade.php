
<x-admin-layout>
<div class="container">
    <div class="row">
    <x-card-wrapper>
    <h3 class="my-3 text-center">Blog Edit Form</h3>
    <form enctype="multipart/form-data" action="/admin/blogs/{{$blog->slug}}/update" method="post">
              @csrf
              @method('patch')
                <x-form.input name="title" value="{{$blog->title}}"/>
                <x-form.input name="intro" value="{{$blog->intro}}"/>
                <x-form.textarea name="body" value="{{$blog->body}}"/>
                <x-form.input name="slug" value="{{$blog->slug}}"/>
                <x-form.input name="thumbnail" type="file" value="{{$blog->thumbnail}}" />
                <img src="/storage/{{$blog->thumbnail}}" width="200px" height="100px" alt="">
                <x-form.input-wrapper>
                <x-form.label name="category"/>
                    <select class="form-control" name="category_id" id="category">
                      @foreach ($categories as $category)
                      <option {{$category->id==old('category_id',$blog->category->id) ? 'selected':''}} value="{{$category->id}}">{{$category->category_name}}</option>
                      @endforeach
                    </select>
                </x-form.input-wrapper>
                <button type="submit" class="btn btn-primary">Edit</button>
              </form>
    </x-card-wrapper>
    </div>
    </div>
</x-admin-layout>