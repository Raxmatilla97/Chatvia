@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('news.index') }}">Yangiliklar sahifasi</a>
            </li>
            <li class="breadcrumb-item active">Yangilik haqida</li>
     </ol>
     <div class="container-fluid " >
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-8 " style=" margin: auto;
                     width: 50%;">
                         <div class="card">
                             <div class="card-header">
                                 <strong>To'liq ma'lumot</strong>
                                  <a href="{{ route('news.index') }}" class="btn btn-light">Orqaga</a>
                             </div>
                             <div class="card-body">
                                 @include('news.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
