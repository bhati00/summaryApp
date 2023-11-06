<!DOCTYPE html>
<html>

<head>
  <title>Summary App</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-4">    
    <div class="card">
      <div class="card-header text-center font-weight-bold">      
      </div>
      <div class="card-body">
        <form name="add-blog-post-form" file='true' id="add-blog-post-form" method="post" action="{{ url('store-raw-text') }}" enctype="multipart/form-data">
          @csrf          
          <div class="form-group">
          <label for="myfile"></label>
          <input >
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </div>
    </div>
  </div>
</body>

</html>