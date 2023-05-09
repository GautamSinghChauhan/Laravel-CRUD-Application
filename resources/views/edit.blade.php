<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Crud</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
          href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
  </script>
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
    </script>
    <script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
    </script>
    
</head>
<body class="bg-light">
<div class="p-3 mb-2 bg-dark text-white">
<div class="container">
  <h1>Laravel Crud Application</h1>
</div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-right">
            <a class="btn btn-primary mb-2" href="{{url('articles')}}">Back</a>



        </div>
    </div>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h5>Articles & Add</h5></div>
            <div class="card-body">
                <!-- <form action="{{ route('articles.add') }}" method="post" name="addarticle" id="addarticle">
                  @csrf
                <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter Title">
               
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Descriptions</label>
                <textarea  class="form-control" id="descriptions" placeholder="Descriptions" cols="30" rows="10"></textarea >
            </div>
            <div class="form-group">
                <label class="form-check-label" for="exampleCheck1">Author</label>
                <input type="text" class="form-control" id="author" aria-describedby="emailHelp" placeholder="Enter Author">
               
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
           


                </form> -->

                <form action="{{ route('articles.edit', ['id' => $article->id]) }}" method="post" name="addarticle" id="addarticle">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" aria-describedby="titleHelp" placeholder="Enter Title" value="{{ old('title', $article->title) }}">
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="descriptions">Descriptions</label>
        <textarea class="form-control @error('descriptions') is-invalid @enderror" id="descriptions" name="descriptions" placeholder="Descriptions" cols="30" rows="10">{{ old('descriptions',$article->descriptions) }}</textarea>
        @error('descriptions')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" aria-describedby="authorHelp" placeholder="Enter Author" value="{{ old('author',$article->author) }}">
        @error('author')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Update Article</button>
</form>


            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
