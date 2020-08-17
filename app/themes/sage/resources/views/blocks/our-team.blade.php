{{--
  Title: Meet the Team
  Description: Display a specified number of Team members
  Category: general_blocks
  Icon: star-filled
  Keywords: Meet-The-Team
  Mode: preview
  Align: full
  --}}

  @php
  // Background Color State
  $background_color_state = get_field('featured_bg_color');
  @endphp

  <div id="{{ $block['keywords'][0] }}" class="section section--team @if(is_admin() || !is_front_page()) active @endif" role="region" aria-label="Meet the Team">
    <div class="container">
      @switch( get_field('design_type_team') )
      @case('design-a')
      @include('partials.team.our-team-a')
      @break
      @case('design-b')
      @include('partials.team.our-team-b')
      @break
      @default
      @break
      @endswitch
    </div>
  </div>
