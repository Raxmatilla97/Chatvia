@extends('layouts.app')

@section('content')
<style>
    .nav-tabs .nav-link {
    margin-bottom: calc(-1 * var(--cui-nav-tabs-border-width));
    background: 0 0;
    border: var(--cui-nav-tabs-border-width) solid transparent;
    border-top-left-radius: var(--cui-nav-tabs-border-radius);
    border-top-right-radius: var(--cui-nav-tabs-border-radius);
    }
    .nav-tabs {
        --cui-nav-tabs-border-width: 1px;
        --cui-nav-tabs-border-color: #c4c9d0;
        --cui-nav-tabs-border-radius: 0.375rem;
        --cui-nav-tabs-link-hover-border-color: #d8dbe0 #d8dbe0 #c4c9d0;
        --cui-nav-tabs-link-active-color: #768192;
        --cui-nav-tabs-link-active-bg: #fff;
        --cui-nav-tabs-link-active-border-color: #c4c9d0 #c4c9d0 #fff;
        border-bottom: var(--cui-nav-tabs-border-width) solid var(--cui-nav-tabs-border-color);
    }
    .nav {
        --cui-nav-link-padding-x: 1rem;
        --cui-nav-link-padding-y: 0.5rem;
        --cui-nav-link-font-weight: ;
        --cui-nav-link-color: var(--cui-link-color);
        --cui-nav-link-hover-color: var(--cui-link-hover-color);
        --cui-nav-link-disabled-color: #8a93a2;
        display: flex;
        flex-wrap: wrap;
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
    }
</style>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Modul Mazmuni sahifasi</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                            Modul mazmuni
                            @if(Auth::user()->hasRole('Admin'))
                                <a class="pull-right" href="{{ route('onlineVideoDars.create') }}"><i class="fa fa-plus-square fa-lg"></i></a>
                            @endif
                           
                        </div>

                         @include('online_video_dars.search_form')
                        
                        <div class="tab-content rounded-bottom">
                            <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1154">
                                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="grid-tab" data-coreui-toggle="tab" data-coreui-target="#grid" type="button" role="tab" aria-controls="grid" aria-selected="true">Grid usulida ko'rish</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="jadval-tab" data-coreui-toggle="tab" data-coreui-target="#jadval" type="button" role="tab" aria-controls="jadval" aria-selected="false" tabindex="-1">Jadval orqali ko'rish</button>
                                    </li>
                                
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active show" id="grid" role="tabpanel" aria-labelledby="grid-tab">
                                    
                                        <div class="content">
                                            <div class="row row-cols-1 row-cols-2 g-4 " >    
                                                @foreach ($onlineVideoDars as $videoKurs )
                                                     
                                                        @if($videoKurs->is_active and $videoKurs->moderatsiya)   
                                                        <div class="col">
                                                            <div class="card" style="width: 20rem;">
                                                                <img src="@if($videoKurs->img)
                                                                /image/{{ $videoKurs->img }}
                                                                @else
                                                                    {{'frontend/images/a270d270d5ca184422cf980475b99e24.gif'}}
                                                                @endif" class="card-img-top" alt="...">
                                                                <hr>
                                                                <div class="card-body">
                                                                <h5 class="card-title">{{ $videoKurs->title }}</h5>
                                                                <p class="card-text">{{ $videoKurs->user->name }}</p>
                                                                <p class="card-text"> <b style="color: blue;">{{ $videoKurs->qachon_boladi}} {{ $videoKurs->qachon_boladi_soat}}</b></p>
                                                                <a href="{{ route('onlineVideoDars.show', [$videoKurs->id]) }}" class="btn btn-primary">Video kursni ko'rish</a>
                                                                </div>
                                                            </div> 
                                                        </div>
                                                        @endif  
                                            
                                                @endforeach
                                            </div> 
                                        </div>


                                    </div>
                                    <div class="tab-pane fade" id="jadval" role="tabpanel" aria-labelledby="jadval-tab">
                                        <div class="card-body">                         
                                            @include('online_video_dars.table')
                                            <div class="pull-right mr-3">
                                                    
                                            </div>
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
            </div>
        </div>
    </div>
@endsection



