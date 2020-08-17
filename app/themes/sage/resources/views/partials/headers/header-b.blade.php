<!---
Header B
----->

@php
$header_cta = get_field('header_cta', 'options');
$address = get_field('address1', 'options');
$city = get_field('city', 'options');
$state = get_field('state', 'options');
$zip = get_field('zipcode', 'options');
@endphp

<div class="header-b">
  <div class="container">

    <div class="header__bottom">

      <nav class="mobile-open">
        <button class="w-hamburger h-hamburger md:hidden nav-toggle js-hamburger" aria-labelledby="toggle-navigation">
          <span id="toggle-navigation" hidden>Toggle Navigation</span>
          <span class="block relative w-full h-hamburger"></span>
        </button>

        @if (has_nav_menu('primary_type_b_left'))
        {!! wp_nav_menu(['theme_location' => 'primary_type_b_left', 'menu_class' => 'nav nav--left', 'container' => '']) !!}
        @endif

        <a class="header__branding" href="{{ home_url('/') }}">
          @if( $branding )
          <img src="{{ $branding }}" alt="{{ get_bloginfo('name', 'display') }}" />
          @else
          <img src="/app/themes/sage/resources/assets/images/bigrigxpress.svg" alt="{{ get_bloginfo('name', 'display') }}" />
          @endif
        </a>

        @if (has_nav_menu('primary_type_b_right'))
        {!! wp_nav_menu(['theme_location' => 'primary_type_b_right', 'menu_class' => 'nav nav--right', 'container' => '']) !!}
        @endif

        <div class="col--right">
          @if($address)
          <a href="https://www.google.com/maps/place/{!! $address !!}+{!! $city !!}+{!! $state !!}+{!! $zip !!}" class="mobile--tele mr-30 desktop-none"><i class="fas fa-map-marker-alt"></i> <span class="hidden ml-15">Get Directions</span></a>
          @endif

          @if( $phone )
          <a class="mobile--tele ml-auto desktop-none" href="tel:{{ preg_replace('/[^0-9]/', '', $phone) }}" aria-labelledby="call">
            <img src="/app/themes/sage/resources/assets/images/telephone.svg" alt="Contact us button" > <span class="hidden ml-15">{{ $phone }}</span>
          </a>
          @endif
        </div>

        <a class="button button--primary ml-30 hidden" href="#">Book now</a>

      </nav>
    </div>
  </div>

</div>
