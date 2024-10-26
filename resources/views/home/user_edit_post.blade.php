<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <base href="/public">
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
    .img_deg{
        height: 100px;
        width: 200px;
        /* margin:auto; */

    }
    .div_flex{
        display:flex;
flex-direction: column;
justify-content: center;
align-items: center;
    }
    </style>
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')
         <!-- banner section start --> 
         <h1 class="title_deg">edit post</h1>
         @if(session()->has('message2'))
         <div class="alert alert-success">
             <button class="close" type="button" aria-hidden="true" data-dismiss="alert">x</button>
             {{session()->get('message2')}}
         </div>
         @endif
        <div>
            <form action="{{url('update_post', $post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div_center">
                    <label for="">title</label>
                    <input type="text" name="title" value="{{$post->title}}">
                </div>
                <div class="div_center">
                    <label for="">description</label>
<textarea name="description" id="description" cols="30" rows="10">{{$post->description}}</textarea>                </div>
        </div>
        <div class="div_center div_flex">                
                 <label for="">old image</label>

            <img class="img_deg" src="/postimage/{{$post->image}}" alt="">
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

         <!-- banner section end -->
      </div>
      <!-- header section end -->
      <!-- services section start -->
    
      <!-- about section end -->
     
      <!-- footer section start -->
      @include('home.footer')    
   </body>
</html>