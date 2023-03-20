<!-- section begin -->
<section id="section-speakers" class="text-light" data-bgimage="url(public/images-event/bg/1.jpg'}}) fixed top center" data-stellar-background-ratio=".2">
<div class="wm wm-border dark wow fadeInDown d-none d-sm-block d-sm-none d-md-none d-lg-block d-lg-none d-xl-block">@lang('asosiy-sahifa.spikerlar')</div>
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
          <h1>@lang('asosiy-sahifa.spikerlar_royxati')</h1>
          <div class="separator"><span><i class="fa fa-square"></i></span></div>
          <div class="spacer-single"></div>
        </div>
      </div>
      <div class="row justify-content-center">

        <div class="clearfix"></div>

        @foreach ($spikers as $spiker)
          <div class="col-xl-3 col-lg-4 col-sm-6 mb30 wow fadeInUp">
            <!-- team member -->
            <div class="de-team-list">
              <div class="team-pic">
                <img src="/image/{{$spiker->img}}" class="img-responsive" alt="" />
              </div>
              <div class="team-desc">
                <h3>{{$spiker->fish}}</h3>
                <p class="lead">{{$spiker->ish_joyi}}</p>
                <div class="small-border"></div>
                <p>{{$spiker->about}}</p>



              </div>
            </div>
            <!-- team close -->
          </div>
        @endforeach
      
      
        <div class="clearfix"></div>

      </div>
    </div>
  </section>
  <!-- section close -->