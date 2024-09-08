<x-layout>
<x-navbar/>
    <div class="container">
  <div class="row">
    <div class="col-md-2">
    <ul class="list-group mt-3">
  <li class="list-group-item"><a class="btn btn-primary" href="/admin/index">Dashboard</a></li>
  <li class="list-group-item"><a class="btn btn-primary" href="/admin/blogs/create">Create Blogs</a></li>
  <li class="list-group-item"><a class="btn btn-primary" href="/admin/institutions/create">Institutions</a></li>
    </ul>
    </div>
    <div class="col-md-10">
    {{$slot}}
    </div>
 
  </div>
    </div>

</x-layout>