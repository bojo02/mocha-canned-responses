<x-layout>
    <div class="container mt-5">
        <h1 class="center">Registration</h1>
        <form action="{{route('register.store')}}" method="POST">
            @CSRF
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="John Doe">
              </div>
              @error('name')
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{$message}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @enderror
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
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password Confirmation</label>
                <input name="password_confirmation" type="password" class="form-control" id="exampleFormControlInput1">
              </div>

              <button type="submit" class="btn btn-success">Register</button>
        </form>
    </div>
</x-layout>