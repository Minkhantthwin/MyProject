<x-layout>
    <x-navbar/>
    <x-card-wrapper>
    <h3 class="my-3 text-center">Blog Create Form</h3>
    <form method="POST">
              @csrf
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" value="{{old('title')}}" required>
                  @error('title')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Body</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="body" required>
                  @error('body')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
               
                <button type="submit" class="btn btn-primary">Login</button>
              </form>
    </x-card-wrapper>
</x-layout>