@if( $posts )
<div class="brm-testimonials js-testimonials">
  @foreach( $posts as $testimonial )
  @php

  $review_source = get_field('review_source');

  @endphp

  <blockquote class="mb-10 brm-testimonial">
    <span>{!! apply_filters('the_content', $testimonial->post_content) !!}</span>
    <footer class="mt-30">
      <strong class="source__name">&#8211; {{ $testimonial->post_title }} on {{ $testimonial->review_source }}</strong>
    </footer>
  </blockquote>
  @endforeach
</div>
@endif
