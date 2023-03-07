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
</style>

<li class="nav-title text-center" style="background-color: #ec167f">MULOQOT</li>
<li class="nav-item {{ Request::is('conversations*') ? 'active' : '' }}">
    <a class="nav-link {{ Request::is('conversations*') ? 'active' : '' }}" href="{{ url('conversations')  }}">
        <i class="nav-icon icon-speech mr-4"></i> {{ __('messages.conversations') }}
    </a>
</li>
<li class="nav-title text-center" style="background-color: #ec167f">YANGILIKLAR</li>
<li class="nav-item {{ Request::is('news.index') ? 'active' : '' }}" >
    <a class="nav-link" href="{{ route('news.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Yangiliklar</span> 
        <span class="badge badge-primary"> {{ App\Models\News::get(['id'])->count()}}</span>
      
    </a>
</li>
<li class="nav-item {{ Request::is('news.create') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('news.create') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Yangilik qo'shish</span>
    </a>
</li>
<li class="nav-item {{ Request::is('news.menyaratgan') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('news.menyaratgan') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Mening yangiliklarim</span>
    </a>
</li>
<li class="nav-title text-center" style="background-color: #ec167f">MODUL MAZMUNI</li>

<li class="nav-item {{ Request::is('modulMazmunis*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('modulMazmunis.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Modul Mazmuni</span>
    </a>
</li>


@if(Auth::user()->hasRole('Admin'))
<li class="nav-title">BOSHQARUV</li>
    <li class="nav-item {{ Request::is('spikerlars*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('spikerlars.index') }}">
            <i class="nav-icon icon-cursor"></i>
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

<li class="nav-title">Nav Title</li>
<li class="nav-item">
  <a class="nav-link" href="#">
    <i class="nav-icon cui-speedometer"></i> Nav item
  </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="#">
    <i class="nav-icon cui-speedometer"></i> With badge
    <span class="badge badge-primary">NEW</span>
  </a>
</li>
<li class="nav-item nav-dropdown">
  <a class="nav-link nav-dropdown-toggle" href="#">
    <i class="nav-icon cui-puzzle"></i> Nav dropdown
  </a>
  <ul class="nav-dropdown-items">
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="nav-icon cui-puzzle"></i> Nav dropdown item
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="nav-icon cui-puzzle"></i> Nav dropdown item
      </a>
    </li>
  </ul>
</li>
<li class="nav-item mt-auto">
  <a class="nav-link nav-link-success" href="https://coreui.io">
    <i class="nav-icon cui-cloud-download"></i> Download CoreUI</a>
</li>
<li class="nav-item">
  <a class="nav-link nav-link-danger" href="https://coreui.io/pro/">
    <i class="nav-icon cui-layers"></i> Try CoreUI
    <strong>PRO</strong>
  </a>
</li>