<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel-10 Image Upload </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>Laravel-10 Image Upload</h2>
            </div>

            <div class="panel-body">
                @if($message = Session::get('success'))
                  <div class="alert alert-success alert-bolck">
                    
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong> {{ $message }} </strong>
                  
                  </div>

                  <img src="images/{{ \Session::get('image') }}" alt="Imagee">
                @endif


                <form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="image" class="form-label">Image:</label>
                        <input type="file" name="image" class="form-control   @error('image') is-invalid @enderror">

                        @error('image')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   
  </body>
</html>