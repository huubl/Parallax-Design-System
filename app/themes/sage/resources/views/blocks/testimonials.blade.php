{{--
  Title: Testimonials
  Description: Add a testimonials carousel
  Category: general_blocks
  Icon: format-quote
  Keywords: testimonials
  Mode: edit
  Align: full
  --}}

  @if( class_exists('ACF') )
  @php
  // Define fields
  $testimonial_type = get_field('testimonial_type');
  $testimonials_wdt = get_field('testimonial_width');
  $testimonials_mbl = get_field('testimonial_background_image')['sizes']['w960x562'];
  $testimonials_dsk = get_field('testimonial_background_image')['sizes']['w1920x562'];
  $text_state = !empty(get_field('testimonial_background_image')) ? 'text-white' : null;
  $testimonials_cnt = get_field('testimonial_content');
  $testimonials_spc = $testimonials_wdt !== 'full' ? 'md:px-10' : 'md:px-0';
  @endphp
  @if(is_admin())
  <script type="text/javascript" src="/app/themes/sage/resources/assets/scripts/slick.min.js"></script>
  @endif
  <script type="text/javascript">
  // Handle testimonials
  jQuery(document).ready( function($){


    if ($('.js-testimonials').length) {
      $('.js-testimonials').slick({
        accessibility: true,
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: true,
        nextArrow: '<div class="next"><img src="/app/themes/sage/resources/assets/images/slick-right.svg" alt="select Next Testimonial"></div>',
        prevArrow: '<div class="prev"><img src="/app/themes/sage/resources/assets/images/slick-left.svg" alt="select Previous Testimonial"></div>',
        dots: false,
        fade: false,
        pauseOnFocus: false,
        pauseOnHover: false,
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
      })
    }


  });

  </script>
  <div id="{{ $block['keywords'][0] }}" class="testimonial--{{ $testimonial_type }} bg-center bg-cover bg-no-repeat {!! $text_state !!}" data-mobile="{{ $testimonials_mbl }}" data-desktop="{{ $testimonials_dsk }}" style="background-image:url({{ $testimonials_dsk }})" role="region" aria-label="Testimonials">

    @php
    //Animation
    $testimonial_animation = get_field('test_animation_control');
    @endphp


    <div class="container py-90">
      <div class="@if(!is_admin()){!! $testimonial_animation !!}@endif text-center">
        @php
        $testimonials_cnt = get_field('testimonial_content');
        @endphp

        @if( $testimonials_cnt )
        {!! apply_filters('the_content', $testimonials_cnt) !!}
        @endif

        {!! do_shortcode('[testimonials]') !!}
      </div>
    </div>


  </div>
  @endif
