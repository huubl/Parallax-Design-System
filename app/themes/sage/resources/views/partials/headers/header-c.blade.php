@php

$header_cta = get_field('header_cta', 'options');
$phone = get_field('phone_number', 'options');
$header_booking = get_field('book_now_url', 'options');

@endphp

<div class="header-c">
  <div class="flex flex-row flex-wrap justify-center md:justify-between">

    <div class="header__left w-full md:w-1/4 bg-white">
      <button class="w-hamburger h-hamburger ml-0 mr-auto md:hidden nav-toggle js-hamburger" aria-labelledby="toggle-navigation">
        <span id="toggle-navigation" hidden>Toggle Navigation</span>
        <span class="block relative w-full h-hamburger"></span>
      </button>

      <div class="logo__container">
        <a class="header__branding w-full max-w-brand md:w-auto md:max-w-initial md:mx-0" href="{{ home_url('/') }}">
          @if( $branding )
          <img src="{{ $branding }}" alt="{{ get_bloginfo('name', 'display') }}" />
          @else
          <img src="/app/themes/sage/resources/assets/images/bigrigxpress.svg" alt="{{ get_bloginfo('name', 'display') }}" />
          @endif
        </a>
      </div>
    </div>


    <div class="header__right w-full md:w-3/4">
      @if($phone || $header_booking || $header_cta)
      <div class="header__top bg-primary-2">
        <div class="inner__block mx-auto ml-0 flex flex-row  justify-between md:justify-end items-center">
          @if( $phone )
          <a class="text-sm text-white pl-15 w-1/2 md:w-auto text-center" href="tel:{{ preg_replace('/[^0-9]/', '', $phone) }}">{{ $phone }}</a>
          @endif

          @if($header_booking)
          <a class="button button--secondary w-1/2 md:w-auto text-center" href="{!! $header_booking !!}">Book Now</a>
          @endif
        </div>
      </div>
      @endif

      <div class="gradient-l-r">
        <div class="inner__block block mx-auto ml-0">
          <nav>
            @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'primary-nav-c w-full md:w-auto nav', 'container' => '']) !!}
            @endif

            <a href="#" class="button button--secondary mt-15 desktop-none">Book Now</a>

            @if( $phone )
            <a class="text-white desktop-none block mt-30" href="tel:{{ preg_replace('/[^0-9]/', '', $phone) }}"><img src="/app/themes/sage/resources/assets/images/tel-phone.svg" class="pr-2 inline-block"> {{ $phone }}</a>
            @endif
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
