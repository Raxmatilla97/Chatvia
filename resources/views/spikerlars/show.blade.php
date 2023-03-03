@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('spikerlars.index') }}">Spikerlar</a>
            </li>
            <li class="breadcrumb-item active">Spiker haqida</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header">
                                 <strong>Ma'lumotlar</strong>
                                  <a href="{{ route('spikerlars.index') }}" class="btn btn-light">Orqaga qaytish</a>
                             </div>
                             <div class="card-body">
                                 @include('spikerlars.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
