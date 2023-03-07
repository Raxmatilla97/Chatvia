@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('news.index') !!}">Yangilikni</a>
          </li>
          <li class="breadcrumb-item active">Tahrirlash</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Yangilikni o'zgartirish</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($news, ['route' => ['news.update', $news->id], 'method' => 'patch', 'files' => true]) !!}
                              
                              @include('news.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection