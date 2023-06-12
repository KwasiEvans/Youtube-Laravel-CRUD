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
            <form action = "{{route('edit-post', $posts->id)}}" method="post" enctype="multipart/form-data">@csrf @method("PUT")
              <div class="form-group">
                <textarea class="form-control" name="post_text" placeholder="{{$posts->text_post}}" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="image">Upload Image</label>
                <input type="file" value="{{asset('storage/' . $posts->image_post)}}" class="form-control-file" id="image" name="post_image">
              </div>
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
          </div>
        </div>
      </div>

      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card mb-4">
              <img src="{{ asset('storage/' . $posts->image_post) }}" class="card-img-top" alt="Post Image">
              <div class="card-body">
                <p class="card-text">{{$posts->text_post}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>