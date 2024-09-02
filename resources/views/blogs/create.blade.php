
<x-layout>
<x-navbar/>
<div class="container">
    <div class="row"></div>
    <x-card-wrapper>
    <h3 class="my-3 text-center">Blog Create Form</h3>
    <form enctype="multipart/form-data" action="/admin/blogs/store" method="post">
              @csrf
                <x-form.input name="title"/>
                <x-form.input name="intro"/>
                <x-form.textarea name="body"/>
                <x-form.input name="slug"/>
                <x-form.input name="thumbnail" type="file"/>
                <x-form.input-wrapper>
                <x-form.label name="category"/>
                    <select class="form-control" name="category_id" id="category">
                      @foreach ($categories as $category)
                      <option {{$category->id==old('category_id') ? 'selected':''}} value="{{$category->id}}">{{$category->category_name}}</option>
                      @endforeach
                    </select>
                </x-form.input-wrapper>
                <button type="submit" class="btn btn-primary">Create</button>
              </form>
    </x-card-wrapper>
    </div>
    </div>
</x-layout>