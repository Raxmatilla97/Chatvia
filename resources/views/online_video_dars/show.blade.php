@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('onlineVideoDars.index') }}">Online Video Darslar</a>
            </li>
            <li class="breadcrumb-item active">To'liq ma'lumot</li>
     </ol>
     <div class="container-fluid " >
        <div class="animated fadeIn">
            @include('coreui-templates::common.errors')
            @include('flash::message')
            <div class="row">
                <div class="col-lg-8 " style=" margin: auto; width: 50%;">
                    <div class="card">
                             <div class="card-header">
                                 <strong>Ma'lumot</strong>
                                  <a href="{{ route('onlineVideoDars.index') }}" class="btn btn-light">Orqaga qaytish</a>
                             </div>
                            
                             <div class="card-body">
                                   
                                 @include('online_video_dars.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
