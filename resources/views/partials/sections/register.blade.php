 <style>
  input[type=text]:focus{
    border-color: #ec167f !important;
  }
  input[type=email]:focus{
    border-color: #ec167f !important;
  }
  input[type=password]:focus{
    border-color: #ec167f !important;
  }
  </style>
 <!-- section begin -->
 <section id="section-register" >
    <div class="wm wm-border dark wow fadeInDown">Kirish uchun</div> 
    <div class="container">
      <div class="row">       
        <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
          <h1>Ro'yxatdan o'tish</h1>
          <div class="separator"><span><i class="fa fa-square"></i></span></div>
          <div class="spacer-single"></div>
        </div>
        <div class="col-md-8 offset-md-2 wow fadeInUp">         
            <div class="row">
              <div class="col-md-12">
                <div class="card mx-4">
                    <div class="card-body p-4">
                    
                        <form method="post" action="{{ url('/register#section-register') }}" id="registerForm">
                            {{ csrf_field() }}
                            <p class="text-muted">{{ __('messages.create_your_account') }}</p>
                            <div class="input-group mb-3">                               
                                <input type="text" class="form-control {{ $errors->has('name')?'is-invalid':'' }}" name="name" value="{{ old('name') }}"
                                       placeholder="{{ __('messages.full_name') }}" id="name">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>                                        
                                    </span>
                                @endif
                            </div>
                            <div class="input-group mb-3">
                              <input type="text" class="form-control {{ $errors->has('yashash_hududi')?'is-invalid':'' }}"
                                       name="yashash_hududi" value="{{ old('yashash_hududi') }}" placeholder="{{ __('messages.yashash_hududi_placeholder') }}"
                                       id="yashash_hududi">
                                @if ($errors->has('yashash_hududi'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('yashash_hududi') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group mb-3">                            
                              <input type="text" class="form-control {{ $errors->has('ish_joyi_yok_oqishi')?'is-invalid':'' }}"
                                     name="ish_joyi_yok_oqishi" value="{{ old('ish_joyi_yok_oqishi') }}" placeholder="{{ __('messages.ish_joyi_yok_oqishi_placeholder') }}"
                                     id="ish_joyi_yok_oqishi">
                              @if ($errors->has('ish_joyi_yok_oqishi'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('ish_joyi_yok_oqishi') }}</strong>
                                  </span>
                              @endif
                          </div>
    
                          <div class="input-group mb-3">                           
                            <select style="background-color: #0d0d0d; border-color: #0d0d0d; color: #eee;" name="ticher_or_student" class=" form-control  {{ $errors->has('ish_joyi_yok_oqishi')?'is-invalid':'' }}" aria-label="Default select example">                          
                              <option value="ticher">O'qituvchiman</option>
                              <option value="student">Talabaman</option>                        
                            </select>
                            @if ($errors->has('ticher_or_student'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('ticher_or_student') }}</strong>
                                </span>
                            @endif
                        </div>
    
                            <div class="input-group mb-3">                            
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
                                       onkeypress="return avoidSpace(event)"
                                       style="background-color: #0d0d0d; border-color: #0d0d0d;">
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
                                <input type="password" name="password_confirmation" 
                                  class="form-control"
                                  placeholder="{{ __('messages.confirm_password') }}" 
                                  id="password_confirmation" 
                                  onkeypress="return avoidSpace(event)"
                                  style="background-color: #0d0d0d; border-color: #0d0d0d;">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                                   </span>
                                @endif
                            </div>
                            <button type="submit"
                                    id="registerBtn"
                                    class="btn btn-primary btn-block btn-flat btn-sm"
                                    style="width: 50%;
                                    margin-right: auto;
                                    margin-left: auto;
                                    font-size: 20px;
                                    height: 50px;">{{ __('messages.register') }}</button>
                            
                        </form>
                    </div>
                </div>
            </div>
           

              <div class="col-md-12 text-center">
                <p id='submit'>
                
                  <a href="{{ url('/login') }}" class="text-center btn btn-line">{{ __('messages.already_have_membership') }}</a>
                </p>
                <div id='mail_success' class='success'>Ваша регистрация принята.</div>
                <div id='mail_fail' class='error'>Произошла ошибка при отправке.</div>
              </div>
            </div>
         
        </div>


      </div>
    </div>

  </section>
  <!-- section close -->