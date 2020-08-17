{{--
  Title: Google Maps
  Description: Produces section to display an iframe of google maps
  Category: general_blocks
  Icon: format-quote
  Keywords: Google maps
  Mode: preview
  Align: full
  --}}

  @php
  // Section Padding
  $iframe_height = get_field('iframe_height');
  $iframe_src = get_field('iframe_src');
  @endphp


  <div class="section section__google-maps">

    <iframe src="{!! $iframe_src !!}"
    width="100%"
    height="{!! $iframe_height !!}"
    frameborder="0"
    style="border:0;"
    allowfullscreen=""
    aria-hidden="false"
    tabindex="0"
    ></iframe>
  </div>
