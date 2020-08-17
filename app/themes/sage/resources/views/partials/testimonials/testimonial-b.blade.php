@php
$testimonials_cnt = get_field('testimonial_content');
$logo_bg = get_field('logos_background_color');

// border radius
$border_tl = get_field('testimonial_radius_tl');
$border_bl = get_field('testimonial_radius_bl');

//Animation
$testimonial_animation = get_field('test_animation_control');

$images = get_field('logos_to_include');
$bg_image = get_field('logos_background_image')['sizes']['w960x800'];
@endphp

<div class="testimonial__content">
  <div class="testimonial__content--inner @if(!is_admin()){!! $testimonial_animation !!}@endif">
  @if( $testimonials_cnt )
  {!! apply_filters('the_content', $testimonials_cnt) !!}
  @endif

  {!! do_shortcode('[testimonials]') !!}
</div>
</div>


<div class="testimonial__logos"
style="
background-color: {!! $logo_bg !!};
background-image: url({!! $bg_image !!});
border-top-left-radius:{!! $border_tl !!}%;
border-bottom-left-radius:{!! $border_bl !!}%;
">
<div class="testimonial__logos--inner">

  @if( $images )
  @foreach( $images as $image )
  <div class="test__bg--image" style="
  background-image: url({!! $image['sizes']['thumbnail'] !!});
  ">
</div>
</li>
@endforeach
@endif
</div>
</div>
