<div class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- logo begin -->
        <div id="logo">
          <a href="">
            <img style="width: 60px;" class="logo" src="{{'/frontend/images/logo.png'}}" alt="">
          </a>
        </div>
        <!-- logo close -->

        <!-- small button begin -->
        <span id="menu-btn"></span>
        <!-- small button close -->

        <div class="header-extra">
          <div class="v-center">
            <span id="b-menu">
              <span></span>
              <span></span>
              <span></span>
            </span>
          </div>
        </div>

        <!-- mainmenu begin -->
        <ul id="mainmenu" class="ms-2">
          <li><a href="#section-hero">@lang('asosiy-sahifa.asosiy_sahifa')<span></span></a></li>
          <li><a href="#section-about">@lang('asosiy-sahifa.biz_haqimizda')<span></span></a></li>
          <li><a href="#section-features">@lang('asosiy-sahifa.modul_mazmuni')<span></span></a></li>
          <li><a href="#section-speakers">@lang('asosiy-sahifa.spikerlar')<span></span></a></li>
          {{-- <li><a href="#section-schedule">@lang('asosiy-sahifa.jadval')<span></span></a></li> --}}
          <!-- <li><a href="#section-ticket">Ticket<span></span></a></li> -->
          {{-- <li><a href="#section-sponsors">@lang('asosiy-sahifa.homiylar')<span></span></a></li> --}}
          <li><a href="#section-register">@lang('asosiy-sahifa.royxatdan_otish')<span></span></a></li>
          <li><a href="{{ route('login')}}">@lang('asosiy-sahifa.login')<span></span></a></li>
          @if(App::isLocale('en'))
          <li><a href="{{ url('setlocale/uz')}}">Uz<span></span></a></li>
          <li><a href="{{ url('setlocale/ru')}}">Ru<span></span></a></li>
          @endif

          @if(App::isLocale('uz'))
          <li><a href="{{ url('setlocale/en')}}">En<span></span></a></li>
          <li><a href="{{ url('setlocale/ru')}}">Ru<span></span></a></li>
          @endif

          @if(App::isLocale('ru'))
          <li><a href="{{ url('setlocale/uz')}}">Uz<span></span></a></li>
          <li><a href="{{ url('setlocale/en')}}">En<span></span></a></li>
          @endif
        </ul>
        <!-- mainmenu close -->
      </div>
    </div>
  </div>