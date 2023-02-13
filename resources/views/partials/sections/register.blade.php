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
          <form name="contactForm" id='contact_form' method="post" action='http://hive.courses/send.php'>
            <div class="row">
              <div class="col-md-6">
                <div id='name_error' class='error'>Пожалуйста введите ваше имя.</div>
                <div>
                  <input type='text' name='name' id='name' class="form-control" placeholder="Имя">
                </div>

                <div id='email_error' class='error'>Пожалуйста введите ваш Email</div>
                <div>
                  <input type='text' name='email' id='email' class="form-control" placeholder="Email">
                </div>

                <div id='phone_error' class='error'>Пожалуйста введите ваш телефон.</div>
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