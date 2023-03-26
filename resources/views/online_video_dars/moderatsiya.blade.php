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
                             Moderatsiya uchun yuborilgan video kurslar ro'yxati
                             {{-- <a class="pull-right" href="{{ route('news.create') }}"><i class="fa fa-plus-square fa-lg"></i></a> --}}
                         </div>
                         <div class="card-body">
                            @if($videoKurs->count() >= 1)
                                <div class="table-responsive-sm">
                                    <table class="table table-striped" id="news-table">
                                        <thead>
                                            <tr>
                                                <th>№</th>
                                                <th>Nomlanishi</th>   
                                                <th>Aktivligi</th>
                                                <th>Moderatsiya</th>
                                                <th>Yaratilgan sana</th>
                                                {{-- <th>Yaratgan</th> --}}
                                                <th colspan="3">Amaliyot</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                        @foreach($videoKurs as $resurs)
                                                <tr>
                                                    <td><b>{{ $i++ }}</b></td>
                                                    <td>{{ $resurs->title }}</td>
                                                    <td>@if($resurs->is_active)
                                                        <p class="btn btn-success btn-sm">Aktiv</p>
                                                        @else
                                                        <p class="btn btn-danger btn-sm">No Aktiv</p>
                                                        @endif
                                                    
                                                    </td>             
                                                    <td>@if($resurs->moderatsiya)
                                                        <p class="btn btn-success btn-sm">Tasdiqlangan</p>
                                                    @else
                                                        <p class="btn btn-danger btn-sm">Tasdiqlanmagan</p>
                                                    @endif
                                                    
                                                </td>
                                                    <td>{{ $resurs->created_at }}</td>
                                                    {{-- <td><p class="btn btn-info btn-sm">{{ $resurs->user->name }}</p></td> --}}
                                                    <td></td>
                                                    <td>
                                                        {!! Form::open(['route' => ['onlineVideoDars.destroy', $resurs->id], 'method' => 'delete']) !!}
                                                        <div class='btn-group'>
                                                            <a href="{{ route('onlineVideoDars.show', [$resurs->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                                                            <a href="{{ route('onlineVideoDars.edit', [$resurs->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                                                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Qaroringiz qatiymi?')"]) !!}
                                                        </div>
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div style="width: 50%; margin: auto;">
                                    <img style="width: 100%; display:block; margin:auto;" src="/image/gif_load.gif" alt="">
                                    <h2 class="text-center p-5" style="margin-top: 20px;">Moderatsiyaga yuborilgan video kurslar mavjud emas!</h2>
                                </div>                                
                            @endif
                        </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
   

@endsection

