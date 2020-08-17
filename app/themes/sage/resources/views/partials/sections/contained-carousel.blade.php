@php
// Define background images
$bg_mobile = get_sub_field('section_builder_background')['sizes']['w960x800'];
$bg_desktop = get_sub_field('section_builder_background')['sizes']['w960x800'];

// Background State
$background_state = !empty(get_sub_field('section_builder_background')) ? 'js-background' : null;

// Order State
$order_state = get_sub_field('section_builder_split_flip');

// Background Color State
$background_color_state = get_sub_field('section_builder_background_color');

// Content
$content = get_sub_field('section_builder_content');

$c_gallery = get_sub_field('community_gallery_slider');

$slider_id = get_sub_field('slider_id');

@endphp
@if(is_admin())
<script type="text/javascript" src="/app/themes/sage/resources/assets/scripts/slick.min.js"></script>
@endif



@switch( get_sub_field('slider_id') )
@case('slider-one')

<script type="text/javascript">

jQuery(document).ready( function($){

  $('.js-carousel-slider-one').slick({
    accessibility: true,autoplay: true,autoplaySpeed: 15000,fade: true,pauseOnFocus: false,pauseOnHover: false,speed: 1000,slidesToShow: 1,slidesToScroll: 1,dots: false,arrows: true,
    nextArrow: '<div class="next"><i class="fas fa-chevron-right"></i></div>',
    prevArrow: '<div class="prev"><i class="fas fa-chevron-left"></i></div>',
  });
});

</script>

@break
@case('slider-two')
<script type="text/javascript">

jQuery(document).ready( function($){

  $('.js-carousel-slider-two').slick({
    accessibility: true,autoplay: true,autoplaySpeed: 15000,fade: true,pauseOnFocus: false,pauseOnHover: false,speed: 1000,slidesToShow: 1,slidesToScroll: 1,dots: false,arrows: true,
    nextArrow: '<div class="next"><i class="fas fa-chevron-right"></i></div>',
    prevArrow: '<div class="prev"><i class="fas fa-chevron-left"></i></div>',
  });
});

</script>
@break
@case('slider-three')
<script type="text/javascript">

jQuery(document).ready( function($){

  $('.js-carousel-slider-three').slick({
    accessibility: true,autoplay: true,autoplaySpeed: 15000,fade: true,pauseOnFocus: false,pauseOnHover: false,speed: 1000,slidesToShow: 1,slidesToScroll: 1,dots: false,arrows: true,
    nextArrow: '<div class="next"><i class="fas fa-chevron-right"></i></div>',
    prevArrow: '<div class="prev"><i class="fas fa-chevron-left"></i></div>',
  });
});

</script>
@break
@default
@break
@endswitch


<section class="section section--{{ $i }} section--{{ $section_state }} {{ $order_state }} {{ $background_color_state }}">
  <div class="container flex flex-wrap justify-between">
    @if ( $c_gallery )
    <div class="slider--images w-full md:w-1/2 js-carousel-{!! $slider_id !!}">
      @php foreach ( $c_gallery as $gallery_item ) { @endphp
        <div class="section__bg slide--image" style="background-image: url({!! $gallery_item['sizes']['w680x510'] !!});"></div>
        @php } @endphp
      </div>
      @endif
      @if( $content )
      <div class="section__content w-full md:w-1/2 flex items-center justify-center">
        <div class="section__content__inner">
          {!! $content !!}
        </div>
      </div>
      @endif

    </div>
  </section>
