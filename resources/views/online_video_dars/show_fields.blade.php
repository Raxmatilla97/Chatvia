@if($onlineVideoDars->is_active )
<main role="main" class="container">
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow">
      <img class="mr-3" src="{{asset('frontend/images/logo.png')}}" alt="" width="48" height="48">
      <div class="lh-100">
        <h5 class="mb-0 text-white lh-100">{{ $onlineVideoDars->title }}</h5>
        <small>{{ $onlineVideoDars->user->name }}</small>
      </div>
    </div>

    <div class="my-3 p-3 bg-white rounded box-shadow">
            <!-- Img Field -->
    <div class="form-group d-flex align-items-center justify-content-center h-100 w-80   ">   
        <img style="height: 400px; display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;"
        
        @if($onlineVideoDars->img)
          src="{{ asset('image')}}/{{$onlineVideoDars->img}}"
        @else
          src="/frontend/images/a270d270d5ca184422cf980475b99e24.gif"              
        @endif 
          alt="">
    </div>
      <h6 class="border-bottom border-gray pb-2 mb-0"> {!! Form::label('content', 'Asosiy yangilik qismi:') !!}</h6>
    
        <!-- Content Field -->
        <div class="form-group mt-4">               
            {!! $onlineVideoDars->content !!}
        </div>

        <hr>
     {{-- {{   \Carbon\Carbon::parse($onlineVideoDars->qachon_boladi)}} 
        {{   \Carbon\Carbon::now()}} --}}

      

        @if($onlineVideoDars->yutube_video_url == "")
            @if($onlineVideoDars->jit_meet_url != "")
                <div class="mt-5">
                    <div class="docs-example">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Onlayn video dars</h4>
                            <p>Siz bu yerdan onlayn jonli video darslarni ko'rishingiz mumkin.</p>
                            <hr>
                            @if($onlineVideoDars->online_dars_holati == "hali_boshlanmagan" or $onlineVideoDars->online_dars_holati == "dars_boshlangan")       
                            <h2 class="text-center mb-4"> Online darsning bo'lish vaqti: ({{$onlineVideoDars->qachon_boladi}} - {{$onlineVideoDars->qachon_boladi_soat}})</h2>
                            @endif 
                            <div>
                              @if($onlineVideoDars->online_dars_holati == "hali_boshlanmagan")                             
                                <div class="alert alert-primary d-flex align-items-center justify-content-center h-100"  role="alert">
                                  <b>Online dars hali boshlanmagan!</b>
                                </div>
                              @elseif($onlineVideoDars->online_dars_holati == "dars_boshlangan")
                                <div class="alert alert-light d-flex align-items-center justify-content-center h-100" role="alert">
                                  <b>Online dars ayni damda bo'lmoqda!</b>
                                </div>                              
                                <iframe width="100%" height="750px" allow="camera; microphone; display-capture; autoplay; clipboard-write" sandbox="allow-scripts allow-same-origin allow-popups allow-forms allow-downloads" allowfullscreen="true"
                                src="{{$onlineVideoDars->jit_meet_url}}">
                                </iframe>
                              @elseif($onlineVideoDars->online_dars_holati == "dars_tugagan")
                                <div class="alert alert-danger d-flex align-items-center justify-content-center h-100" role="alert">
                                  <b>Online dars tugagan!</b>
                                </div>
                              @endif   

                            </div>
                           
                      

                        </div>
                    </div>  
                </div>
            @else
                <div class="alert alert-warning" role="alert">
                    Onlayn darslar rejalashtirilmagan!
                </div>
            @endif
        @endif

       
                
        @if($onlineVideoDars->yutube_video_url != "")
          @php
          $videoUrl = $onlineVideoDars->yutube_video_url;
          $convertUrl = str_replace("watch?v=", "embed/", $videoUrl);
          @endphp
            <div class="mt-5">
                <div class="docs-example">
                    <div class="alert alert-info" role="alert">
                        <h4 class="alert-heading">Video darsni ko'rish</h4>
                        <p>Siz bu yerdan joylangan video darslarni ko'rishingiz mumkin.</p>
                        <hr>
                        <iframe width="100%" height="440" src="{{$convertUrl}}" title="{{ $onlineVideoDars->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        
                    </div>
                </div>  
            </div>
        @else
            <div class="alert alert-warning" role="alert">
                Hech qanday video dars joylanmagan!
            </div>
        @endif
        
      
      <small class="d-block text-right mt-3">
        <a href="#">{{ $onlineVideoDars->created_at }}</a>
      </small>
    </div>

    <div class="my-3 p-3 bg-white rounded box-shadow">
      <h6 class="border-bottom border-gray pb-2 mb-0">Muallif</h6>
      <div class="media text-muted pt-3">
        <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_18698bbdc5c%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_18698bbdc5c%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.541290283203125%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 32px; height: 32px;">
        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
          <div class="d-flex justify-content-between align-items-center w-100">
            <strong class="text-gray-dark">{{ $onlineVideoDars->user->name }}</strong>
            {{-- <a href="#">Follow</a> --}}
          </div>
          <span class="d-block">@username</span>
        </div>
      </div>   
    
    
    </div>
  </main>
@else 
<div class="docs-example">
  <div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">Bunday sahifa mavjud emas!</h4>
    <p>Kechirasiz, Bunday sahifa mavjud emas!</p>
    <hr>
   
  </div>
  </div>
@endif

