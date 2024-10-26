<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
   @include('home.css')
   <style>
    .title_deg{
        color: white;
        font-size: 60px;
        font-weight: bold;
        text-align: center;
        padding: 20px;
    }
    .div_center{
        text-align: center;
        margin: 10px;
        padding: 20px;
    }
    label{
        display: inline-block;
        width: 200px;
    }
    </style>
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')
         <!-- banner section start -->
         <!-- banner section end -->
      <!-- header section end -->
      <!-- services section start -->
      <!-- services section end -->
      <!-- about section start -->
      <!-- about section end -->
      <h1 class="title_deg">add post</h1>
      @if(session()->has('message'))
      <div class="alert alert-success">
          <button class="close" type="button" aria-hidden="true" data-dismiss="alert">x</button>
          {{session()->get('message')}}
      </div>
      @endif
        <div>
            <form action="{{url('create_post_store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div_center">
                    <label for="">title</label>
                    <input type="text" name="title">
                </div>
                <div class="div_center">
                    <label for="">description</label>
<textarea name="description" id="description" cols="30" rows="10">description</textarea>                </div>
        </div>
        <div class="div_center">
            <label for="">addd image</label>
            <input type="file" name="image">
        </div>
        <div class="div_center">
            <input type="submit" class="btn btn-primary">
        </div>
    </form>

      </div>
      <!-- footer section start -->
      @include('home.footer')    

   </body>
</html>