@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('modulMazmunis.index') !!}">Modul Mazmuni</a>
      </li>
      <li class="breadcrumb-item active">Yaratish</li>
    </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Modul mazmunlarini yaratish</strong>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'modulMazmunis.store', 'files' => true]) !!}

                                   @include('modul_mazmunis.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
