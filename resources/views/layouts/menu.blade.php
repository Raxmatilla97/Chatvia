<style>
    .sidebar .nav-link:hover {
    color: #fff;
    background: #883ff9;
}
body{
    /* Created with https://www.css-gradient.com */
    background: #23EC55;
    background: -webkit-radial-gradient(top right, #23EC55, #2D51C1);
    background: -moz-radial-gradient(top right, #23EC55, #2D51C1);
    background: radial-gradient(to bottom left, #23EC55, #2D51C1);
    }
  
 header{
    background: linear-gradient(to right, #883ff9, #ec167f);
 }
.navbar-nav .nav-link {
    color: #f2f2f2;
}
.badge-primary {
    margin-left: 5px;
}

.sidebar .nav-title {
    padding: 0.05rem 1rem;
    font-size: 80%;
    font-weight: 700;
    color: #e4e7ea;
    text-transform: uppercase;
}
.modal-backdrop {
    position: inherit !important;
    top: 0;
    left: 0;
    z-index: 1040;
    width: 100vw;
    height: 100vh;
    background-color: #000;
}

.modal-content {
    position: relative;
    display: -webkit-box;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: #f0f3f5;
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 0.3rem;
    outline: 0;
}

</style>

<li class="nav-title text-center" style="background-color: #ec167f">MULOQOT</li>
<li class="nav-item {{ Request::is('conversations*') ? 'active' : '' }}">
    <a class="nav-link {{ Request::is('conversations*') ? 'active' : '' }}" href="{{ url('conversations')  }}">
        <i class="nav-icon icon-speech mr-4"></i> {{ __('messages.conversations') }}
    </a>
</li>
<li class="nav-item {{ Request::is('statistika*') ? 'active' : '' }}">
  <a class="nav-link {{ Request::is('statistika*') ? 'active' : '' }}" href="{{ url('statistika')  }}">
      <i class="nav-icon icon-speech mr-4"></i> {{ __('messages.statistika') }}
  </a>
</li>

<li class="nav-title text-center" style="background-color: #ec167f">Video kurslar</li>


<li class="nav-item {{ Request::is('onlineVideoDars*') ? 'active' : '' }}">
  <a class="nav-link" href="{{ route('onlineVideoDars.index') }}">
      <i class="fa fa-youtube-play nav-icon mr-4"></i>
      <span>Online Video Kurslar</span>
  </a>
</li>

<li class="nav-item {{ Request::is('onlineVideoDars*') ? 'active' : '' }}">
  <a class="nav-link" href="{{ route('onlineVideoDars.create') }}">
    <i class="fa fa-plus-square nav-icon mr-4"></i>
      <span>Video kurs yaratish</span>
  </a>
</li>
@if(Auth::user()->hasRole('Admin'))
<li class="nav-item {{ Request::is('news.moderatsiya') ? 'active' : '' }}">
  <a class="nav-link" href="{{ route('onlineVideoDars.moderatsiya') }}">
    <i class="fa fa-check-circle nav-icon mr-4"></i>
      <span style="margin-right: 5px;">Moderatsiya</span>
      <span class="badge badge-warning"> {{ App\Models\OnlineVideoDars::where('moderatsiya', '=', 0)->get(['id'])->count()}}</span>
  </a>
</li>
@endif

<li class="nav-title text-center" style="background-color: #ec167f">YANGILIKLAR</li>
<li class="nav-item {{ Request::is('news.index') ? 'active' : '' }}" >
    <a class="nav-link" href="{{ route('news.index') }}">
        <i class="fa fa-newspaper-o nav-icon mr-4"></i>
        <span>Yangiliklar</span> 
        <span class="badge badge-primary"> {{ App\Models\News::get(['id'])->count()}}</span>
      
    </a>
</li>
<li class="nav-item {{ Request::is('news.menyaratgan') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('news.menyaratgan') }}">
      <i class="fa fa-user-plus nav-icon mr-4"></i>
        <span>Mening yangiliklarim</span>
    </a>
</li>
<li class="nav-item {{ Request::is('news.create') ? 'active' : '' }}">
  <a class="nav-link" href="{{ route('news.create') }}">
    <i class="fa fa-plus-square nav-icon mr-4"></i>
      <span>Yangilik qo'shish</span>
  </a>
</li>
@if(Auth::user()->hasRole('Admin'))
<li class="nav-item {{ Request::is('news.moderatsiya') ? 'active' : '' }}">
  <a class="nav-link" href="{{ route('news.moderatsiya') }}">
    <i class="fa fa-check-circle nav-icon mr-4"></i>
      <span style="margin-right: 5px;">Moderatsiya</span>
      <span class="badge badge-warning"> {{ App\Models\News::where('is_ready', '=', 0)->get(['id'])->count()}}</span>
  </a>
</li>
@endif
<li class="nav-title text-center" style="background-color: #ec167f">MODUL MAZMUNI</li>

<li class="nav-item {{ Request::is('modulMazmunis*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('modulMazmunis.index') }}">
        <i class="fa fa-university nav-icon mr-4"></i>
        <span>Modul Mazmuni</span>
    </a>
</li>

<li class="nav-item nav-dropdown {{ Request::is('modulMazmunis*') ? 'active' : '' }}">
  <a class="nav-link nav-dropdown-toggle" href="#">
    <i class="fa fa-th-list nav-icon mr-4"></i> Yo'nalishlar
  </a>
  <ul class="nav-dropdown-items">
    <li class="nav-item {{ Request::is('modulMazmunis.mavular') ? 'active' : '' }}">
      <a class="nav-link" href="/modulMazmunis/category/mavular">
        <i class="nav-icon cui-puzzle"></i>Mavzular
      </a>
    </li>
    <li class="nav-item {{ Request::is('modulMazmunis.tagdimotlar') ? 'active' : '' }}">
      <a class="nav-link" href="/modulMazmunis/category/tagdimotlar">
        <i class="nav-icon cui-puzzle"></i> Tag'dimotlar
      </a>
    </li>
    <li class="nav-item {{ Request::is('modulMazmunis.video_darslar') ? 'active' : '' }}">
      <a class="nav-link" href="/modulMazmunis/category/video_darslar">
        <i class="nav-icon cui-puzzle"></i> Video darslar
      </a>
    </li>
    <li class="nav-item {{ Request::is('modulMazmunis.oqish_uchun_tafsiya') ? 'active' : '' }}">
      <a class="nav-link" href="/modulMazmunis/category/oqish_uchun_tafsiya">
        <i class="nav-icon cui-puzzle"></i> O'qish uchun tafsiya qilingan manbalar
      </a>
    </li>
    <li class="nav-item {{ Request::is('modulMazmunis.maqola_va_tezislar') ? 'active' : '' }}">
      <a class="nav-link" href="/modulMazmunis/category/maqola_va_tezislar">
        <i class="nav-icon cui-puzzle"></i> Maqola va tezislar
      </a>
    </li>
    <li class="nav-item {{ Request::is('modulMazmunis.ilmiy_ishlar') ? 'active' : '' }}">
      <a class="nav-link" href="/modulMazmunis/category/ilmiy_ishlar">
        <i class="nav-icon cui-puzzle"></i> Ilmiy ishlar
      </a>
    </li>
    <li class="nav-item {{ Request::is('modulMazmunis.meyoriy_hujjatlar') ? 'active' : '' }}">
      <a class="nav-link" href="/modulMazmunis/category/meyoriy_hujjatlar">
        <i class="nav-icon cui-puzzle"></i> Meyoriy hujjatlar
      </a>
    </li>
   
    <li class="nav-item {{ Request::is('modulMazmunis.shaxsiy_hujjatlar') ? 'active' : '' }}">
      <a class="nav-link" href="/modulMazmunis/category/shaxsiy_hujjatlar">
        <i class="nav-icon cui-puzzle"></i> Shaxsiy hujjatlar
      </a>
    </li>

  </ul>
</li>

<li class="nav-item {{ Request::is('modulMazmunis.menyaratgan') ? 'active' : '' }}">
  <a class="nav-link" href="{{ route('modulMazmunis.menyaratgan') }}">
      <i class="fa fa-user-plus nav-icon mr-4"></i>
      <span>Men yaratgan resurslar</span>
  </a>
</li>

<li class="nav-item {{ Request::is('modulMazmunis.create') ? 'active' : '' }}">
  <a class="nav-link" href="{{ route('modulMazmunis.create') }}">
      <i class="fa fa-plus-square nav-icon mr-4"></i>
      <span>Yangi resurs yaratish</span>
  </a>
</li>
@if(Auth::user()->hasRole('Admin'))
<li class="nav-item {{ Request::is('modulMazmunis.moderatsiya') ? 'active' : '' }}">
  <a class="nav-link" href="{{ route('modulMazmunis.moderatsiya') }}">
      <i class="fa fa-check-circle nav-icon mr-4"></i>
      <span style="margin-right: 5px;">Moderatsiya</span>
      <span class="badge badge-warning"> {{ App\Models\ModulMazmuni::where('is_moderate', '=', 0)->get(['id'])->count()}}</span>
  </a>
</li>
@endif

@if(Auth::user()->hasRole('Admin'))
<li class="nav-title"  style="background-color: #ec167f">BOSHQARUV</li>
    <li class="nav-item {{ Request::is('spikerlars*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('spikerlars.index') }}">
            <i class="fa fa-graduation-cap nav-icon mr-4  "></i>
            <span>Spikerlar</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
            <i class="fa fa-users nav-icon mr-4"></i>
            <span>{{ __('messages.users') }}</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('roles*') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('roles*') ? 'active' : '' }}" href="{{ route('roles.index') }}">
            <i class="fa fa-user nav-icon mr-4"></i>
            <span>{{ __('messages.roles') }}</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('reported-users*') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('reported-users*') ? 'active' : '' }}"
           href="{{ route('reported-users.index') }}">
            <i class="fa fa-flag nav-icon mr-4"></i>
            <span>{{ __('messages.reported_user') }}</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('settings*') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('settings*') ? 'active' : '' }}" href="{{ route('settings.index') }}">
            <i class="fa fa-gear nav-icon mr-4"></i>
            <span>{{ __('messages.settings') }}</span>
        </a>
    </li>
@endif
{{-- <li class="nav-item {{ Request::is('onlineVideolars*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('onlineVideolars.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Online Videolars</span>
    </a>
</li> --}}
