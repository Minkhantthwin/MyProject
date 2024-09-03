    @props(['name', 'value'=>''])
    <x-form.input-wrapper>
    <x-form.label :name="$name"/>
      <textarea type="text" class="form-control" id="{{$name}}" name="{{$name}}" required>{{old($name,$value)}}</textarea>
      @error('{{$name}}')
      <p class="text-danger">{{$message}}</p>
      @enderror
    </x-form.input-wrapper>