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
        <li class="breadcrumb-item">Yangiliklar</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             Yangiliklar qismi
                             {{-- <a class="pull-right" href="{{ route('news.create') }}"><i class="fa fa-plus-square fa-lg"></i></a> --}}
                         </div>
                         <div class="tab-content rounded-bottom">
                            <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1154">
                              <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="grid-tab" data-coreui-toggle="tab" data-coreui-target="#grid" type="button" role="tab" aria-controls="grid" aria-selected="true">Grid usulida ko'rish</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="jadval-tab" data-coreui-toggle="tab" data-coreui-target="#jadval" type="button" role="tab" aria-controls="jadval" aria-selected="false" tabindex="-1">Jadval orqali ko'rish</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="contact-tab" data-coreui-toggle="tab" data-coreui-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false" tabindex="-1">Men yaratgan yangliklar</button>
                                </li>
                              </ul>
                              <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="grid" role="tabpanel" aria-labelledby="grid-tab">
                                  
                                    <div class="content">

                                        
                                    
                                         <div class="row row-cols-1 row-cols-2 g-4">
                                            <div class="col">
                                                <div class="card" style="width: 25rem;">
                                                    <img src="{{'frontend/images/a270d270d5ca184422cf980475b99e24.gif'}}" class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                    <h5 class="card-title">Yangilik yaratish</h5>
                                                    <p class="card-text">Ilim fanga oid qiziqarli yangiliklarni yozib fodyalanuvchilar bilan bo'lishing</p>
                                                    <a href="{{ route('news.create') }}" class="btn btn-primary">Yangilik yozish</a>
                                                    </div>
                                                </div>
                                            </div> 
                                           
                                            @foreach ($news as $news2 )
                                            @if($news2->is_active and $news2->is_ready)   
                                            <div class="col">
                                                <div class="card" style="width: 20rem;">
                                                    <img src="@if($news2->img)
                                                    /image/{{ $news2->img }}
                                                    @else
                                                        {{'frontend/images/a270d270d5ca184422cf980475b99e24.gif'}}
                                                    @endif" class="card-img-top" alt="...">
                                                    <hr>
                                                    <div class="card-body">
                                                    <h5 class="card-title">{{ $news2->title }}</h5>
                                                    <p class="card-text">{{ $news2->user->name }}</p>
                                                    <a href="{{ route('news.show', [$news2->id]) }}" class="btn btn-primary">O'qish</a>
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
                                        @include('news.table')
                                         <div class="pull-right mr-3">
                                                
                                         </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="card-body">                         
                                        @include('news.men_yaratgan')
                                         <div class="pull-right mr-3">
                                                
                                         </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                       
                     </div>
                  </div>
             </div>
         </div>
    </div>
    <style>
        body{
            /* Created with https://www.css-gradient.com */
            background: #23EC55;
            background: -webkit-radial-gradient(top right, #23EC55, #2D51C1);
            background: -moz-radial-gradient(top right, #23EC55, #2D51C1);
            background: radial-gradient(to bottom left, #23EC55, #2D51C1);
            }
         
    </style>

@endsection

