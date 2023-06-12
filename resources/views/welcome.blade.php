<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
          <div class="col-md-6">
            <form action = "{{route('post')}}" method="post" enctype="multipart/form-data">@csrf
              <div class="form-group">
                <textarea class="form-control" name="post_text" rows="3" placeholder="Write your post"></textarea>
              </div>
              <div class="form-group">
                <label for="image">Upload Image</label>
                <input type="file" class="form-control-file" id="image" name="post_image">
              </div>
              <button type="submit" class="btn btn-primary">Post</button>
            </form>
          </div>
        </div>
      </div>

      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-6">
            @foreach ($posts as $post)
            <div class="card mb-4">
              <div class="card-header">
                <div class="d-flex justify-content-end">
                  <a href="{{route('edit', $post->id)}}" class="btn btn-primary btn-sm mr-2">Edit</a>
                  <form action="{{route('delete_post', $post->id)}}" method="post">@csrf @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                </div>
              </div>
              @if($post != null)
              <img src="{{ asset('storage/' . $post->image_post) }}" class="card-img-top" alt="Post Image">
              @endif
              <div class="card-body">
                <p class="card-text">{{$post->text_post}}</p>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      
      
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>