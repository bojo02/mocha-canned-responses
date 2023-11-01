<x-layout>
    <div class="container mt-5">
        <h1 class="center">Login</h1>
        <form action="{{route('login.attempt')}}" method="POST">
            @CSRF
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                @error('email')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{$message}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleFormControlInput1">
                @error('password')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{$message}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</x-layout>