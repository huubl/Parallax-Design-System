@php

$header_cta = get_field('header_cta', 'options');

$header_booking = get_field('book_now_url', 'options');
$contact_hours = get_field('contact_hours', 'options');

@endphp

<div class="header-d">
  <div class="container">
    <div class="flex flex-row flex-wrap items-center md:items-center justify-center md:justify-between">

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

        @if($phone || $header_booking)
        <div class="header__contact md:flex md:flex-row md:justify-end">
          @if( $phone )
          <a class="block md:inline-block my-15" href="tel:{{ preg_replace('/[^0-9]/', '', $phone) }}"><img src="/app/themes/sage/resources/assets/images/contact-icon.svg" class="inline-block pr-2 contact-icon" alt="Contact {{ get_bloginfo('name', 'display') }}"> (855) CMM-HVAC</a>
          @endif

          @if($header_booking)
          <a class="button button--secondary button--schedule mobile-none">Schedule Service</a>

          <a class="button button--secondary desktop-none" href="{!! get_permalink(188) !!}">Schedule Service</a>
          @endif
        </div>
        @endif
      </nav>

      <button class="w-hamburger h-hamburger ml-0 mr-auto md:hidden nav-toggle js-hamburger" aria-labelledby="toggle-navigation">
        <span id="toggle-navigation" hidden>Toggle Navigation</span>
        <span class="block relative w-full h-hamburger"></span>
      </button>

    </div>
  </div>
</div>

<!-- Form Display Content -->

<div class="form__toggle bg-primary-2 md:w-1/2">
  <div class="form__toggle--inner p-45 relative">
    <a class="button--close"><img src="/app/themes/sage/resources/assets/images/pop-close.svg" alt="Close pop up"></a>
    <h5>Schedule a call today!</h5>
    @if( $phone )
    <h4><a class="block md:inline-block my-15 text-white" href="tel:{{ preg_replace('/[^0-9]/', '', $phone) }}"><img src="/app/themes/sage/resources/assets/images/contact-icon.svg" class="inline-block pr-2 pop__icon"> (855) CMM-HVAC</a></h4>
    @endif
    {!! $contact_hours !!}
    {!! do_shortcode('[gravityform id="1" title="false" description="false"]') !!}
  </div>
</div>
