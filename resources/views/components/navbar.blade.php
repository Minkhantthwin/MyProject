 <!-- navbar -->
 <nav class="navbar navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/index">ACE</a>
      <div class="d-flex">
        <a href="/index" class="nav-link">Home</a>

        <a href="#blogs" class="nav-link">Blogs</a>
       <!--!auth()->check --> 
       @guest 

        <a href="/register" class="nav-link">Register</a>
        <a href="/login" class="nav-link">Login</a>
        
        @else
        @can('admin') <!--Check AppServiceProvider(Built a gate for admin check)-->
        <a href="/admin/index" class="nav-link">Dashboard</a>
        @endcan
        
        <a href="#" class="nav-link">Welcome {{auth()->user()->name}}</a>

        @endguest
        <!-- <a href="#subscribe" class="nav-link">Subscribe</a> -->
         @if (auth()->check())

         <form action="/logout" method="POST">
          @csrf
          <button
          type="submit"
          class="nav-link btn btn-link">Log Out</button>
         </form>

         @endif
        
      </div>
    </div>
  </nav>