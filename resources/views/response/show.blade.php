<x-layout>
    <div class="container mt-5">
        <div class="title-buttons clear">
            <h1 class="center">Showing response: {{$response->name}}</h1>
            <form action="{{route('response.destroy', ['response' => $response->id])}}" method="POST">
              @CSRF
              @method("DELETE")
              <button type="submit" class="btn btn-danger m-2">Delete</button>
              <a href="{{route('response.edit', ['response' => $response->id])}}" class="btn btn-primary m-2">Edit</a>
            </form>
            
            
            
        </div>
        
        <h4 class="mt-5">Your canned response:</h4>
        <div class="card mt-5">
            <div class="card-body">
                
                <span id="toCopy" name="content"  >{!!$response->content!!}</span>

              
            </div>
          </div>
          <button class="btn btn-dark mt-3" onclick="copyContent()">Copy!</button>
    </div>

    <script>
        let element = document.getElementById('toCopy').innerHTML;
        let textEdit = element.replace(/(<([^>]+)>)/gi, "");
        let text = textEdit.replace(/\&nbsp;/g, '');
        const copyContent = async () => {
          try {
            await navigator.clipboard.writeText(text);
            console.log('Content copied to clipboard');
          } catch (err) {
            console.error('Failed to copy: ', err);
          }
        }
      </script>


</x-layout>