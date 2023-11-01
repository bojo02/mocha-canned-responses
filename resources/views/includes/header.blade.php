<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}">Mocha Canned</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @auth
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route('home')}}">Canned</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('response.create')}}">Add response</a>
          </li>
         @endauth
        </ul>
        @auth
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Search
        </button>
        <a href="{{route('logout')}}" class="btn btn-danger ms-3">Logout</a>
        @else
        <a href="{{route('login')}}" class="btn btn-primary me-3">Login</a>
        <a href="{{route('register')}}" class="btn btn-success ">Register</a>
        @endauth
      </div>
    </div>
  </nav>
  
  

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Search Response</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Begin typing</label>
          <input type="text" class="form-control search-input" id="exampleFormControlInput1">
        </div>
        
        <div class="search-content mt-5">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('js/search.js')}}"></script> 