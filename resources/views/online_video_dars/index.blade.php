@extends('layouts.app')

@section('content')


    <ol class="breadcrumb">
        <li class="breadcrumb-item">Online Video Darslar</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             Online Video Darslarlar jadvali
                             <a class="pull-right" href="{{ route('onlineVideoDars.create') }}"><i class="fa fa-plus-square fa-lg"></i></a>
                         </div>
                         <div class="card-body">
                             @include('online_video_dars.table')
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>

                         <div style="margin: auto; width: 50%; margin-top: 10px; margin-bottom: 70px">
                            {!! $onlineVideoDars->links() !!}
                        </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

