<div class="services_section layout_padding">
    <div class="container">
       <h1 class="services_taital">Services </h1>
       <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
       <div class="services_section_2">
          <div class="row">
            @foreach ($post as $p)
               
             <div class="col-md-4">
                <div><img src="/postimage/{{$p->image}}" class="services_img"></div>
                <div class="btn_main"><a href="#">{{$p->title}}</a></div>
                <h1>{{$p->description}}</h1>
                <p>post by {{$p->usertype}}</p>
             </div>
             @endforeach

          </div>
       </div>
    </div>
 </div>