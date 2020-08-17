@php
$bg_image = get_field('invest_image')['sizes']['w1920x800'];
$width = get_field('invest_background_width');
$height = get_field('invest_background_height');
@endphp


<div class="section section--invest {{ $background_color_state }} active ">
  <div class="container relative">
    <div class="section__bg block mx-auto {!! $location !!}"
    style="
    min-height: 100vh;
    left: 0;
    right: 0;
    ">
    <div class="fp-bg" style="background-image: url(/app/uploads/2020/07/Team-hero.jpg);"></div>
    <div class="content">
      <div class="content--inner bg-primary-2 bloxk mx-auto {!! $white_text !!} {!! $background_color !!} {!! $content_location !!} {!! $animate !!}">
        <h1 class="mb-0">Investor <br> Login</h1>
        <a href="#" class="button p-0 mb-30">Request access <img src="/app/themes/sage/resources/assets/images/arrow-right.svg"></a>



        @php
        $redirect_to = '/investor-login/';
        @endphp
        <form name="loginform" id="loginform" action="<?php echo site_url( '/wp-login.php' ); ?>" method="post" autocomplete="off">
          <div class="gform_body">
            <p><input id="user_login" type="text" size="20" value="" name="log" placeholder="User Name" autocomplete="off"></p>
            <p><input id="user_pass" type="password" size="20" value="" name="pwd" placeholder="Password" autocomplete="off"></p>
          </div>

          <div class="gform_footer">
            <p><input id="wp-submit" class="gform_button" type="submit" value="Login" name="wp-submit"></p>
          </div>

          <input type="hidden" value="<?php echo esc_attr( $redirect_to ); ?>" name="redirect_to">
        </form>


        <div class="help__login mt-60 text-white">
          <a href="/need-help/" class="inline-block">Need Help?</a>  |  <a href="/brmlogin/?action=lostpassword" class="inline-block">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
