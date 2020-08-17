@php

$content_width = get_field('content_width');
$content_position = get_field('content_position');
$max_height = get_field('hero_height');
$hero_graphic = get_field('hero_graphic');

//Animation
$hero_animation = get_field('hero_animation');

@endphp

<div id="section1" class="section active w-full brm-hero" role="region" aria-label="Hero">
  <div class="container section-brm--hero flex flex-col flex-wrap justify-center items-center bg-no-repeat js-background" style="background-image:url({{ $options['desktop'] }}); min-height: {!! $max_height !!}px;" data-mobile="{{ $options['desktop'] }}" data-desktop="{{ $options['desktop'] }}">
    <div class="hero_content text-white mx-auto block {{ $content_width === 'w-full' ? 'w-full' : ' w-full md:w-1/2' }} {{ $content_position === 'ml-0' ? 'ml-0' : 'full' }} {{ $content_position === 'mr-0' ? 'mr-0' : 'full' }}"
    style="
    background-image: url({!! $hero_graphic !!});
    min-height: {!! $max_height !!}px;">
      <div class="hero_content--container container @if(!is_admin()){!! $hero_animation !!}@endif">
        {!! $options['content'] !!}
      </div>
    </div>
  </div>
</div>
