
<div class="dropdown">
    <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
      {{isset($currentCategory) ? $currentCategory->category_name : 'Filter By Category'}}
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
      <li><a class="dropdown-item" href="/index">all</a></li>
      @foreach ($categories as $category)

      <li><a class="dropdown-item" href="/index/?category={{$category->slug}}{{request('search')?'&search='.request('search') : ''}}
        {{request('username')?'&username='.request('username') : ''}}">
        {{$category->category_name}}</a></li>

      @endforeach  
    </ul>
  </div>