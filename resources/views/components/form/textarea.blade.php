    @props(['name'])
    <x-form.input-wrapper>
    <x-form.label :name="$name"/>
      <textarea type="text" class="form-control" id="{{$name}}" name="{{$name}}" value="{{old($name)}}" required></textarea>
      @error('{{$name}}')
      <p class="text-danger">{{$message}}</p>
      @enderror
    </x-form.input-wrapper>