{{--
  Title: Column-Slider
  Description: Add Columns that becomes a slick slider on mobile.
  Category: columns_blocks
  Icon: admin-links
  Keywords: BigRigMedia
  Mode: preview
  Align: full
  --}}

  @if(is_admin())
  <script type="text/javascript" src="/app/themes/sage/resources/assets/scripts/slick.min.js"></script>
  @endif

  <script type="text/javascript">
  jQuery(document).ready( function($){
    if (window.matchMedia('(max-width: 1500px)').matches) {


      // Columns Becomes Slider on mobile
      if ($('.js-columns-1').length) {
        $('.js-columns-1').slick({
          accessibility: true,
          adaptiveHeight: true,
          autoplay: true,
          autoplaySpeed: 5000,
          arrows: false,
          dots: true,
          fade: false,
          pauseOnFocus: false,
          pauseOnHover: false,
          speed: 1000,
          slidesToShow: 2,
          slidesToScroll: 2,
          responsive: [
            {
              breakpoint: 560,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              },
            },
          ],
        })
      }

      // Columns Becomes Slider on mobile
      if ($('.js-columns-2').length) {
        $('.js-columns-2').slick({
          accessibility: true,
          adaptiveHeight: true,
          autoplay: true,
          autoplaySpeed: 8000,
          arrows: false,
          dots: true,
          fade: false,
          pauseOnFocus: false,
          pauseOnHover: false,
          speed: 1000,
          slidesToShow: 2,
          slidesToScroll: 2,
          responsive: [
            {
              breakpoint: 560,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              },
            },
          ],
        })
      }

      // Columns Becomes Slider on mobile
      if ($('.js-columns-3').length) {
        $('.js-columns-3').slick({
          accessibility: true,
          adaptiveHeight: true,
          autoplay: true,
          autoplaySpeed: 10000,
          arrows: false,
          dots: true,
          fade: false,
          pauseOnFocus: false,
          pauseOnHover: false,
          speed: 1000,
          slidesToShow: 2,
          slidesToScroll: 2,
          responsive: [
            {
              breakpoint: 560,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              },
            },
          ],
        })
      }
    }
  });
  </script>

  @php

  // Define background images
  $bg_column_mobile = get_field('background_image_column_slider')['sizes']['w960x800'];
  $bg_column_desktop = get_field('background_image_column_slider')['sizes']['w1920x800'];

  // Background State
  $background_state = !empty(get_field('background_image_column_slider')) ? 'text-white' : null;

  // Background Color State
  $background_color_state = get_field('background_color_column_slider');

  // Verticle Padding
  $vertical_padding = get_field('vertical_padding');

  // Slider Controls
  $slider_control = get_field('slick_control');
  // Flex Justification Controls
  $flex_justify = get_field('flex_justify');
  // Flex alignment
  $flex_alignment = get_field('flex_alignment');
  // Incramentation
  $i = $i + 1;

  @endphp

  @if( class_exists('ACF') )
  @if( have_rows('column_slider') )
  <div  class="section column-slider--{!! $i !!} bg-cover bg-center active {!! $background_state !!} {{ $background_color_state }}">
  <div class="container px-buffer"
  style="
  background-image:url({{ $bg_column_desktop }});
  padding: {!! $vertical_padding !!}px 0px;
  ">
  <div class="brm-columns {!! $slider_control !!} flex {!! $flex_justify !!} {!! $flex_alignment !!}">
    @while( have_rows('column_slider') ) @php the_row() @endphp
    @php
    // Define fields
    $column_content = get_sub_field('column_content');
    $column_width = get_sub_field('column_width');
    $pad_x = get_sub_field('column_padding');
    $i = $i + 1;
    @endphp
    <div class="column column--{{ $i }} {!! $column_width !!}"
    style="
    Padding: 0px {!! $pad_x !!}px;"
    >
    @if( $column_content )
    {!! $column_content !!}
    @endif
  </div>
  @endwhile
</div>
</div>
</div>
@endif
@endif
