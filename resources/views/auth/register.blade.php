@extends('layouts.auth_layout')
@section('title')
    {{ __('messages.register') }}
@endsection
@section('meta_content')
    - {{ __('messages.register') }} {{ __('messages.to') }} {{getAppName()}}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ mix('assets/css/simple-line-icons.css')}}">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mx-4">
                <div class="card-body p-4">
                    <form method="post" action="{{ url('/register') }}" id="registerForm">
                        {{ csrf_field() }}
                        <h1>{{ __('messages.register') }}</h1>
                        <p class="text-muted">{{ __('messages.create_your_account') }}</p>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="icon-user"></i>
                              </span>
                            </div>
                            <input type="text" class="form-control {{ $errors->has('name')?'is-invalid':'' }}" name="name" value="{{ old('name') }}"
                                   placeholder="{{ __('messages.full_name') }}" id="name">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="email" class="form-control {{ $errors->has('email')?'is-invalid':'' }}"
                                   name="email" value="{{ old('email') }}" placeholder="{{ __('messages.email') }}"
                                   id="email">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="icon-lock"></i>
                              </span>
                            </div>
                            <input type="password" class="form-control {{ $errors->has('password')?'is-invalid':''}}"
                                   name="password" placeholder="{{ __('messages.password') }}" id="password"
                                   onkeypress="return avoidSpace(event)">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="icon-lock"></i>
                              </span>
                            </div>
                            <input type="password" name="password_confirmation" class="form-control"
                                   placeholder="{{ __('messages.confirm_password') }}" id="password_confirmation" onkeypress="return avoidSpace(event)">
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                               </span>
                            @endif
                        </div>
                        <button type="button" id="registerBtn"
                                class="btn btn-primary btn-block btn-flat">{{ __('messages.register') }}</button>
                        <a href="{{ url('/login') }}" class="text-center">{{ __('messages.already_have_membership') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- 
@extends('home.pages-layout')
 
@section('title', "Ro'yxatdan o'tish formasi")

@section('content')
    <!-- section begin -->
 <section id="section-register">
    <!-- <div class="wm wm-border dark wow fadeInDown">сейчас</div> -->
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
          <h1>Зарегистрироваться сейчас</h1>
          <div class="separator"><span><i class="fa fa-square"></i></span></div>
          <div class="spacer-single"></div>
        </div>

        <div class="col-md-8 offset-md-2 wow fadeInUp">
          <form name="contactForm" action="{{ url('/register') }}" id='contact_form' method="post">
            <div class="row">
              <div class="col-md-6">
                @if ($errors->has('name'))
                    <div id='name_error' class='error'>Ilitmos Loginizni yozing</div>
                @endif               
                <div>
                  <input type='text' name='name' id='name' class="form-control {{ $errors->has('name')?'is-invalid':'' }}" placeholder="To'liq ismingiz"  value="{{ old('name') }}">
                </div>
                @if ($errors->has('email'))
                    <div id='email_error' class='error'>Email manzilni yozishni unutmang!</div>
                @endif 
                <div>
                  <input type='text' name='email' id='email' class="form-control {{ $errors->has('email')?'is-invalid':'' }}" placeholder="Email"  value="{{ old('email')>
                </div>
                @if ($errors->has('phone'))
                    <div id='phone_error' class='error'>Iltimos telefon nomeringizni yozing</div>
                @endif 
               
                <div>
                  <input type='text' name='phone' id='phone' class="form-control" placeholder="Телефон">
                </div>
              </div>
              <div class="col-md-6">
                <div id='message_error' class='error'>Введите сообщение</div>
                <div>
                  <textarea name='message' id='message' class="form-control" placeholder="Сообщения"></textarea>
                </div>
              </div>

              <div class="col-md-12 text-center">
                <p id='submit'>
                  <input type='submit' id='send_message' value='Зарегистрироваться' class="btn btn-line">
                </p>
                <div id='mail_success' class='success'>Ваша регистрация принята.</div>
                <div id='mail_fail' class='error'>Произошла ошибка при отправке.</div>
              </div>
            </div>
          </form>
        </div>


      </div>
    </div>

  </section>
  <!-- section close -->
@endsection --}}