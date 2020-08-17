@if( class_exists('ACF') )
@php

$bg_color = get_field('contact_background_color','options');
$contact_type = get_field('contact_components', 'options');
$contact_bg_image = get_field('contact_background_image', 'options');

// Define background images
$contact_bg_mobile = get_field('contact_background_image', 'options')['sizes']['w960x800'];
$contact_bg_desktop = get_field('contact_background_image', 'options')['sizes']['w1920x800'];

// Background State
$background_state = !empty(get_field('contact_background_image', 'options')) ? 'js-background text-white bg-cover bg-right' : null;

@endphp
<section id="{{ $block['keywords'][0] }}" class="section bg-{{$bg_color}} {!! $contact_type !!} {{ $background_state }}" role="region" aria-label="Contact" data-mobile="{{ $contact_bg_mobile }}" data-desktop="{{ $contact_bg_desktop }}">
      @switch( get_field('contact_components', 'options') )
        @case('contact-a')
          @include('partials.contacts.contacts-a')
        @break
        @case('contact-b')
          @include('partials.contacts.contacts-b')
        @break
        @case('contact-c')
          @include('partials.contacts.contacts-c')
        @break
        @default
          <!-- Display nothing -->
        @break
      @endswitch
  </section>
@endif
