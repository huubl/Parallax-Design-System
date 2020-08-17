@php

$header_cta = get_field('header_cta', 'options');
$address = get_field('address1', 'options');
$city = get_field('city', 'options');
$state = get_field('state', 'options');
$zip = get_field('zipcode', 'options');
$header_booking = get_field('book_now_url', 'options');

@endphp

<div class="header-a">
  <div class="header__bottom">
    <div class="container flex items-center justify-between md:justify-between">
      <a class="header__branding w-full max-w-brand md:w-auto md:max-w-initial md:mx-0" href="{{ home_url('/') }}">
        @if( $branding )
        <img src="{{ $branding }}" alt="{{ get_bloginfo('name', 'display') }}" />
        @else
        <img src="/app/themes/sage/resources/assets/images/bigrigxpress.svg" alt="{{ get_bloginfo('name', 'display') }}" />
        @endif
      </a>
      <nav>
        @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'primary-nav-a w-full md:w-auto nav', 'container' => '']) !!}
        @endif


        <div class="mobile-portal mt-30 desktop-none pt-15">
          @if(!is_user_logged_in())
          <a href="{!! get_permalink(268) !!}" class="text-white">INVESTOR LOGIN</a>
          @else
          <a href="{!! wp_logout_url(get_permalink()) !!}" class="text-white">LOGOUT</a>
          @endif
        </div>
      </nav>

      <button class="w-hamburger h-hamburger md:hidden nav-toggle js-hamburger" aria-labelledby="toggle-navigation">
        <span id="toggle-navigation" hidden>Toggle Navigation</span>
        <span class="block relative w-full h-hamburger"></span>
      </button>
    </div>
  </div>

</div>
