@php

$social_icons_bg_color = get_field('component_background_color','options');

@endphp

@switch( get_field('header_component', 'options') )
  @case('social_footer')
  @if( App::siteSocialLinks() )
  <div class="section social__media"
  style="
  background-color: {!! $social_icons_bg_color !!};
  "
  >
    <div class="container">
      @foreach( App::siteSocialLinks() as $link )
      <a class="social-icon inline-flex items-center justify-center w-icon h-icon rounded" href="{{ $link['url'] }}" aria-labelledby="{{ strtolower($link['title']) }}">
        <span id="{{ strtolower($link['title']) }}" hidden>{{ $link['title'] }}</span>
        {!! $link['svg'] !!}
      </a>
      @endforeach
    </div>
  </div>
  @endif
  @break
  @case('none')
  <!-- Display Nothing -->
  @break
  @break
@endswitch
