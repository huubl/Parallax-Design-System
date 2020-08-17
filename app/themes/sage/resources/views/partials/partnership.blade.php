@php

$partnership_logo = get_field('partnership_logos_gallery','options');

@endphp
@if( $partnership_logo )
<section class="md:py-30 section--partnership bg-primary-1">
  <div class="container">
    @foreach( $partnership_logo as $logo )
    <div class="partnership__image" style="
    background-image: url({!! $logo['sizes']['large'] !!});
    "></div>
  @endforeach
</div>
</section>
@endif
