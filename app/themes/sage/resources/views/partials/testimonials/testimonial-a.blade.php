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
