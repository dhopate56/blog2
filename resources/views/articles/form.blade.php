<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel 11 Ajax Image Upload with form with example - Readerstacks </title>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <link href="//netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" />

</head>

<body>
  <div class="container">

    <div class="panel panel-primary">
      <div class="panel-heading">
        <h2>Laravel 11 Ajax Image Upload with form with example - Readerstacks</h2>
      </div>
      <div class="panel-body">

        <form method="post" id="uploadimageform" action="{{url('upload-article')}}" name="registerform">
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" value="" class="form-control" />
            @csrf
          </div>
          <div class="form-group">
            <label>Phone number</label>
            <input type="text" name="phone_number" value="" class="form-control" />

          </div>
          <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="" class="form-control" />

          </div>

          <div class="form-group">
            <label>Image</label>
            <input type="file" placeholder="Image" name="image" id="imgInp">
            <img style="visibility:hidden" id="prview" src="" width=100 height=100 />

          </div>

          <div class="form-group">
            <button class="btn btn-primary">Upload</button>
          </div>
        </form>


      </div>
    </div>
  </div>
</body>
<script>
  $(function() {
    $("#uploadimageform").on("submit", function(e) {
      e.preventDefault();
      var action = $(this).attr("action");
      var method = $(this).attr("method");
      if (method == "post") {
      
        var formData = new FormData(this);

        $.ajax({
          url: action,
          type: 'POST',
          data: formData,
          success: function(data) {
            alert("Form submitted successfully")
          },
          error: function(response, textStatus, errorThrown) {
            console.log(response, textStatus, errorThrown)
            $(".alert").remove();
            var erroJson = JSON.parse(response.responseText);
            for (var err in erroJson) {
              for (var errstr of erroJson[err])
                $("[name='" + err + "']").after("<div class='alert alert-danger'>" + errstr + "</div>");
            }
          },
          cache: false,
          contentType: false,
          processData: false
        });

      }
      return false;

    });
  });
</script>

</html>