<!DOCTYPE html>
<html lang="uz">

<head>
  <meta charset="utf-8">
  <title>{{getAppName()}}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  @include('partials.head')
</head>

<body id="homepage">
  <div id="wrapper">
    <!-- header begin -->
    <header class="transparent">
      <div class="info">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="column">Working Hours Monday - Friday <span class="id-color"><strong>08:00-16:00</strong></span></div>
              <div class="column">Toll Free <span class="id-color"><strong>1800.899.900</strong></span></div>
              <!-- social icons -->
              <div class="column social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-rss"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
                <a href="#"><i class="fa fa-envelope-o"></i></a>
              </div>
              <!-- social icons close -->
            </div>
          </div>
        </div>
      </div>
      @include('partials.sections.menu')
    </header>
    <!-- header close -->
    <!-- content begin -->
    <div id="content" class="no-bottom no-top">
     
        @yield('content')
     
        
      @include('partials.sections.footer')
    </div>
  </div>


  <div id="de-extra-wrap" class="de_light">
    <span id="b-menu-close">
      <span></span>
      <span></span>
    </span>
    <div class="de-extra-content">
      <h3>Информация</h3>
      <p>
        К 2030 году Узбекистан планирует войти в ТОП-50 самых инновационных экономик мира. Достижение данной цели невозможно без повышения качества научных исследований, усиления потенциала наших ученых, стимулирования научного междисциплинарного сотрудничества и повышения количества научных исследований, опубликованных в передовых научных журналах Scopus и Web of Science.
      </p>

      <div class="spacer10"></div>

      <!-- <div class="p-4 border">
        <div class="text-center">
          <h1>485 of 1000</h1>
          <p>Seats available</p>
          <a href="#section-ticket" class="btn-custom btn-fullwidth text-white scroll-to">Get Your Ticket</a>
        </div>
      </div> -->

      <div class="spacer-single"></div>

      <h3>Где &amp; когда?</h3>
      <div class="h6 padding10 pt0 pb0"><i class="i_h3 fa fa-calendar-check-o id-color"></i>15 сентября - 15 декабря</div>
      <div class="h6 padding10 pt0 pb0"><i class="i_h3 fa fa-map-marker id-color"></i>Ташкент Узбекистан</div>
      <div class="h6 padding10 pt0 pb0"><i class="i_h3 fa fa-phone id-color"></i>1 200 300 9000</div>
      <div class="h6 padding10 pt0 pb0"><i class="i_h3 fa fa-envelope-o id-color"></i>info@hive.courses</div>
    </div>
  </div>
  <div id="de-overlay"></div>

  @include('partials.js')
  @include('partials.js-slider')
  @include('partials.js-load')
  @include('partials.js-submit')

</body>
</html>