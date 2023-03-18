@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('modulMazmunis.index') !!}">Modul Ma'zmuni ro'yxati</a>
          </li>
          <li class="breadcrumb-item active">O'zgartirish</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Resursni tahrirlash sahifasi</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($modulMazmuni, ['route' => ['modulMazmunis.update', $modulMazmuni->id], 'method' => 'patch', 'files' => true]) !!}

                              @include('modul_mazmunis.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection