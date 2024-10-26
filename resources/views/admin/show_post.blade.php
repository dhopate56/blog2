<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .img_deg{
            height: 100px;
            width: 200px;
        }
    </style>
  </head>
  <body>
  @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.sidebar')
     <div class="page-content">
        @if(session()->has('message'))
        <div class="alert alert-success">
            <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>
        @endif
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
                <td><img class="img_deg" src="/postimage/{{$p->image}}" alt=""></td>
                <td><a class="btn btn-danger" href="{{url('delete_post', $p->id)}}">delete</a></td>
                <td><a class="btn btn-secondary" href="{{url('edit_post', $p->id)}}">edit</a></td>
                <td><a class="btn btn-success" href="{{url('accept_post', $p->id)}}">accept post</a></td>
                <td><a class="btn btn-danger" href="{{url('reject_post', $p->id)}}">reject post</a></td>



            </tr>
            @endforeach
             
            </tbody>
          </table> 
    </div>
      <!-- Sidebar Navigation end-->
    @include('admin.footer')
  </body>
</html>