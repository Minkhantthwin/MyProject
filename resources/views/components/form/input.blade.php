@props(['name', 'type'=>'text'])
<x-form.input-wrapper>
    <x-form.label :name="$name"/>
  <input type="{{$type}}" class="form-control" id="{{$name}}" aria-describedby="emailHelp" name="{{$name}}" value="{{old($name)}}" required>
  @error('{{$name}}')
  <p class="text-danger">{{$message}}</p>
  @enderror
</x-form.input-wrapper>