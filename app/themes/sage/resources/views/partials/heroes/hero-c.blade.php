@php

$content_width = get_field('content_carousel_width');
$max_height = get_field('hero_height');
@endphp

@if(is_admin())
<script type="text/javascript" src="/app/themes/sage/resources/assets/scripts/slick.min.js"></script>
@endif
<script type="text/javascript">


//// Carousel Hero
jQuery(document).ready( function($){
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
    dots: true,
    arrows: true,
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

<div id="section1" class="section active w-full brm-hero" role="region" aria-label="Hero">
@if( have_rows('hero_carousel') )
<div class="section-brm--hero js-carousel-hero">
  @while( have_rows('hero_carousel') ) @php the_row() @endphp
  @php
  if ( get_sub_field('hero_carousel_image') ) {
    $carousel_mobile = get_sub_field('hero_carousel_image')['sizes']['w960x800'];
    $carousel_desktop = get_sub_field('hero_carousel_image')['sizes']['w1920x800'];

    $carousel_content = get_sub_field('slide_content');
  }
  @endphp

  <div class="hero__carousel__image h-hero md:h-hero_mobile bg-center bg-cover bg-no-repeat js-background"
  style="background-image:url({{ $carousel_desktop }});
  min-height: {!! $max_height !!}px;
  "
   data-mobile="{{ $carousel_mobile }}" data-desktop="{{ $carousel_desktop }}">
    <div class="container">
      <div class="{{ $content_width === 'w-full' ? 'w-full' : 'w-1/2' }}">
        {!! $carousel_content !!}
      </div>
    </div>
  </div>
  @endwhile
</div>
@endif
</div>
