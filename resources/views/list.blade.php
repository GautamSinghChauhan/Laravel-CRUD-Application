

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
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
            <a class="btn btn-primary mb-2" href="{{url('articles/add')}}">Add</a>    
        </div>
        @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h5>Articles & Lists</h5></div>
            <div class="card-body">
                <table class="table">
                <thead class="thead-dark">
                    <th>ID</th>
                    <th>Title</th>
                    <th>Descriptions</th>
                    <th>Author</th>
                    <th>Created</th>
                    <th width="100">Edit</th>
                    <th width="100">Delete</th>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td>1</td>
                            <td>Lorem Ipsum</td>
                            <td>Gautam</td>
                            <td>May</td>
                            <td><button class="btn btn-primary">Edit</button></td>
                            <td><button class="btn btn-danger">Delete</button></td>
                        </tr> -->

                        @foreach($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->descriptions }}</td>
                <td>{{ $article->author }}</td>
                <td>{{ $article->created_at }}</td>
                <td><a href="{{ url('articles/edit', ['id' => $article->id]) }}" class="btn btn-primary">Edit</a>
</td>
<td><a href="#" onclick="deleteArticle({{ $article->id }})" class="btn btn-danger">Delete</a></td>

            </tr>
        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>

<!-- <script>
    function deleteArticle(id) {
        if (confirm("Are you sure you want to delete this article?")) {
            window.location.href = '/articles/delete/' + id;
        }
    }
</script>-->

<!-- <script>
  $(document).ready(function () {
    $('.delete-article').click(function (e) {
      e.preventDefault();

      var articleId = $(this).data('id');

      if (confirm("Are you sure you want to delete this article?")) {
        $.ajax({
          type: 'DELETE',
          url: '/articles/delete/' + articleId,
          success: function (data) {
            location.reload();
          },
          error: function (data) {
            alert('Error deleting article.');
          }
        });
      }
    });
  });
</script> -->

<script>
    function deleteArticle(id) {
    if (confirm("Are you sure you want to delete this article?")) {
        $.ajax({
            type: 'GET',
            url: '/articles/delete/' + id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if(data.success){
                    alert(data.success);
                    location.reload();
                }else if(data.error){
                    alert(data.error);
                }
            },
            error: function (data) {
                alert('Error deleting article.');
            }
        });
    }
}

</script>


<!-- <script>
function deleteArticle(id) {
  if (confirm("Are you sure you want to delete this article?")) {
    $.ajax({
      type: 'DELETE',
      url: '/articles/delete/' + id,
      success: function (data) {
        location.reload();
      },
      error: function (data) {
        alert('Error deleting article.');
      }
    });
  }
}
</script> -->



<!-- <script>
  function deleteArticle(id) {
    if (confirm("Are you sure you want to delete this article?")) {
      $.ajax({
        type: 'DELETE',
        url: '/articles/delete/' + id,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
          location.reload();
        },
        error: function (data) {
          alert('Error deleting article.');
        }
      });
    }
  }
</script> -->



