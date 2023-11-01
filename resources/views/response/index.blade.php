<x-layout>
    <div class="container mt-5">
        <h1 class="center">Your canned responses</h1>

          @foreach($responses as $response)
            <div class="card remove-decoration mt-3 mb-3">
              <a href="{{route('response.show', ['response' => $response->id])}}"><div class="card-body">
                {{$response->name}}
              </div>
              </a>
            </div>
          @endforeach
       {{$responses->links()}}
    </div>
</x-layout>