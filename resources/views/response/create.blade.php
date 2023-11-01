<x-layout>
    <div class="container mt-5">
        <h1 class="center">Create a new Response</h1>

        <form action="{{route('response.store')}}" method="POST">
            @CSRF
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name of the Response</label>
                <input name="name" type="text" class="form-control" id="exampleFormControlInput1">
              </div>
              @error('name')
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{$message}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @enderror
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Response Content</label>
                <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              @error('content')
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{$message}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @enderror
              <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

     
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
5  
  
<script>tinymce.init({selector:'textarea'});</script>
</x-layout>