@php

$iframe_url = get_field('iframe_script');

@endphp
<section class="section section__reservations">
  <div class="container">

    {!! $iframe_url !!}

  </div>
</section>
