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
      
      @include('partials.sections.hero')

      @include('partials.sections.countdown1')

      @include('partials.sections.about')

      @include('partials.sections.features')

      @include('partials.sections.spickers')
     
      {{-- @include('partials.sections.schedule') --}}

      @include('partials.sections.ticket')
      
      {{-- @include('partials.sections.sponsors') --}}

      @include('partials.sections.fikrmulohazalar')

      @include('partials.sections.youtube')

      @include('partials.sections.register')

      @include('partials.sections.countdown')
        
      @include('partials.sections.footer')
    </div>
  </div>


  <div id="de-extra-wrap" class="de_light">
    <span id="b-menu-close">
      <span></span>
      <span></span>
    </span>
   
  </div>
  <div id="de-overlay"></div>

  @include('partials.js')
  @include('partials.js-slider')
  @include('partials.js-load')
  @include('partials.js-submit')

</body>

</html>