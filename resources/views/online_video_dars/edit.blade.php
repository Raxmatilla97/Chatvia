@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('onlineVideoDars.index') !!}">Online video kurslar ro'yxati</a>
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
                              <strong>Video kursni o'zgartirish</strong>
                          </div>
                          <div class="row">
                            <div class="card-body col-lg-6">
                                {!! Form::open(['route' => 'onlineVideolars.store']) !!}
                                    <!-- Title Field -->
                                    <div class="form-group col-sm-12">
                                        {!! Form::label('title', 'Videoning nomlanishi:') !!}
                                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                                    </div>

                                    <!-- Youtube Field -->
                                    <div class="form-group col-sm-12">
                                        {!! Form::label('youtube', 'Youtubedan manzil:') !!}
                                        {!! Form::text('youtube', null, ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group col-sm-12" style="visibility: hidden;">
                                        {!! Form::label('videokurs_id', 'Youtube:') !!}
                                        {!! Form::text('videokurs_id', $onlineVideoDars->id, ['class' => 'form-control']) !!}
                                    </div>

                                    <!-- Submit Field -->
                                    <div class="form-group col-sm-12 " style="text-align: right; margin-top: -60px;" >
                                        {!! Form::submit("Qo'shish", ['class' => 'btn btn-primary']) !!}
                                    
                                    </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="card-body col-lg-6">
                                <img src="https://k3-cottage.ru/wp-content/uploads/2022/11/Youtube-S-mbolo-300x169.png" alt="" 
                                style=" display: block;
                                margin-left: auto;
                                margin-right: auto;
                                width: 30%;">
                            <h3 style="margin-top: 40px" class="text-center">Sizning video kursingizda: {{ $videolar }} ta video dars mavjud.</h3>
                            
                            </div>
                        </div>
                        <hr>   
                          <div class="card-body">
                              {!! Form::model($onlineVideoDars, ['route' => ['onlineVideoDars.update', $onlineVideoDars->id], 'method' => 'patch', 'files' => true]) !!}

                              @include('online_video_dars.fields')

                              {!! Form::close() !!}
                            </div>
                            <hr>
                            <h2 class="text-center">Ushbu kursga qo'shilgan video darslar</h2>

                            <div class="card-body">
                                <div class="table-responsive-sm">
                                    <table class="table table-striped" id="onlineVideolars-table">
                                        <thead>
                                            <tr>
                                                <th>№</th>
                                                <th>Video</th>
                                                <th>Video nomi</th>
                                                <th>Youtube manzili</th>
                                                <th colspan="3">Amaliyotlar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @php
                                               $i = 1; 
                                            @endphp
                                        @foreach($onlineVideolars as $onlineVideolar)
                                            <tr>
                                                <td><b>{{ $i++}}</b></td>
                                                <td>
                                                    @php
                                                    $videoUrl = $onlineVideolar->youtube;
                                                    $convertUrl = str_replace("watch?v=", "embed/", $videoUrl);
                                                  @endphp                
                                                    <iframe width="100%" height="auto" src="{{$convertUrl}}" title="{{ $onlineVideolar->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                
                                                
                                                </td>
                                                <td style="font-size: 18px;"><b>{{ $onlineVideolar->title }}</b></td>
                                            <td>{{ $onlineVideolar->youtube }}</td>
                                                <td>
                                                    {!! Form::open(['route' => ['onlineVideolars.destroy', $onlineVideolar->id], 'method' => 'delete']) !!}
                                                    <div class='btn-group'>
                                                       
                                                        <a href="{{ route('onlineVideolars.edit', [$onlineVideolar->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                                                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Qaroringiz qatiymi?')"]) !!}
                                                    </div>
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
    
                                 <div class="pull-right mr-3">
                                        
                                 </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection