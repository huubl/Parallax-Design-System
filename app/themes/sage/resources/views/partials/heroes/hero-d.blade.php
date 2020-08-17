@php

$video_group = get_field('hero_video');
$content_width = get_field('content_carousel_width');
$content_position = get_field('content_position');
$max_height = get_field('hero_height');
//Animation
$hero_animation = get_field('hero_animation');
@endphp

@if($video_group )
<video class="hero__video" preload="auto" autoplay loop muted playsinline>
  <source data-src="{!! $video_group['hero_mp4'] !!}" type="video/mp4"/>
  <source data-src="{{ $video_group['hero_webm'] }}" type="video/webm"/>
</video>
@endif

@if(is_admin())
<script type="text/javascript" src="/app/themes/sage/resources/assets/scripts/slick.min.js"></script>
@endif
<script type="text/javascript">
//// Carousel Hero
jQuery(document).ready( function($){
  //// Carousel Hero
    $('.js-carousel-hero').slick({
      accessibility: true,
      adaptiveHeight: false,
      autoplay: true,
      autoplaySpeed: 150000,
      fade: true,
      pauseOnFocus: false,
      pauseOnHover: false,
      speed: 1000,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      arrows: false,
      nextArrow: '<div class="next"><i class="fas fa-chevron-right"></i></div>',
      prevArrow: '<div class="prev"><i class="fas fa-chevron-left"></i></div>',
      responsive: [
        {
          breakpoint: 768,
          settings: {
            arrows: false,
          },
        },
      ],
    });
});
</script>

<div id="section1" class="section active w-full brm-hero hero__type--c flex flex-row items-center" role="region" aria-label="Hero"
  style="min-height: {!! $max_height !!}px;"
>
  <div class="section-brm--hero js-carousel-hero @if(! is_admin()) {!! $hero_animation !!} @endif">
    @if( have_rows('hero_carousel') )
    @while( have_rows('hero_carousel') ) @php the_row() @endphp
    @php
    $carousel_content = get_sub_field('slide_content');
    @endphp

    <div class="section-brm--hero flex items-center justify-center bg-no-repeat js-background">
      <div class="hero_content text-white mx-auto block {{ $content_width === 'w-full' ? 'w-full' : ' w-full md:w-1/2' }} {{ $content_position === 'ml-0' ? 'ml-0' : 'full' }} {{ $content_position === 'mr-0' ? 'mr-0' : 'full' }}"
      style="
      background-image: url({!! $hero_graphic !!});
      ">
        <div class="hero_content--container container @if(!is_admin()){!! $hero_animation !!}@endif pt-30 md:pt-60">
          {!! $carousel_content !!}
        </div>
      </div>
    </div>
    @endwhile
    @endif
  </div>
</div>
