@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Onlayn video kurslar</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             Men a'zo bo'lgan video kurslar ro'yxati
                             {{-- <a class="pull-right" href="{{ route('modulMazmunis.create') }}"><i class="fa fa-plus-square fa-lg"></i></a> --}}
                         </div>
                         <div class="card-body">                         
                            <div class="table-responsive-sm">
                                <table class="table table-striped" id="news-table">
                                    <thead>
                                        <tr>
                                            <th>Nomlanishi</th>   
                                            <th>Aktivligi</th>
                                          
                                            <th>Yaratilgan sana</th>
                                            <th>Yaratgan</th>
                                            <th colspan="3">Amaliyot</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($videoKurs as $resurs)
                                        <tr>
                                            <td>{{ $resurs->title }}</td>
                                            <td>@if($resurs->is_active)
                                                 <p class="btn btn-success btn-sm">Aktiv</p>
                                                @else
                                                 <p class="btn btn-danger btn-sm">No Aktiv</p>
                                                @endif
                                              
                                            </td>       
                                            
                                         
                                            <td>{{ $resurs->created_at }}</td>
                                            <td><p class="btn btn-info btn-sm">{{ $resurs->user->name }}</p></td>
                                            <td></td>
                                            <td>                                              
                                                <div class='btn-group'>
                                                    <a href="{{ route('onlineVideoDars.show', [$resurs->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>                                                    
                                                </div>
                                               
                                            </td>
                                        </tr>
                                    
                                      
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
   

@endsection

