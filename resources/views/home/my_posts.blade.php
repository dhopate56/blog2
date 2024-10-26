<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
   @include('home.css')
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
      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">description</th>
            <th scope="col">usertype</th>
            <th scope="col">post by</th>
            <th scope="col">image</th>

          </tr>
        </thead>
        <tbody>
            @foreach($post as $p)
          <tr>
            <th scope="row">1</th>
            <td>{{$p->title}}</td>
            <td>{{$p->description}}</td>
            <td>{{$p->usertype}}</td>
            <td>{{$p->name}}</td>
            <td><img class="img_deg" style="height: 200px; width:250px;" src="/postimage/{{$p->image}}" alt=""></td>
            <td><a class="btn btn-danger" href="{{url('delete_post', $p->id)}}" onclick="return confirm('are u sure to delete?')">delete</a></td>
            <td><a class="btn btn-primary" href="{{url('user_edit_post', $p->id)}}">edit</a></td>

        </tr>
        @endforeach
         
        </tbody>
      </table> 

      <!-- footer section start -->
      @include('home.footer')    
   </body>
</html>