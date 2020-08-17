@if( class_exists('ACF') )
@if(have_rows('split_builder'))
@while(have_rows('split_builder')) @php the_row() @endphp

@php
// Define background images
$bg_mobile = get_sub_field('section_builder_background')['sizes']['w960x800'];
$bg_desktop = get_sub_field('section_builder_background')['sizes']['w960x800'];

// Background State
$background_state = !empty(get_sub_field('section_builder_background')) ? 'js-background' : null;

// Order State
$order_state = get_sub_field('section_builder_split_flip');

// Margin
$margin_value_left = get_sub_field('content_margen_left');
$margin_value_right = get_sub_field('content_margen_right');


// Section Padding
$pad_y = get_sub_field('section_padding_y');
$pad_x = get_sub_field('section_padding_x');

//section width
$image_width = get_sub_field('image_section_width');
$content_width = get_sub_field('content_section_width');

// Background Color State
$background_color_state = get_sub_field('section_builder_background_color');

// Content
$content = get_sub_field('section_builder_content');

// Animation
$animate = get_sub_field('animate_content');

@endphp


<div class="secion section--split {{ $order_state }} @if(is_admin()) active @endif">
  <div class="section__bg {{ $background_state }} w-full bg-cover bg-center md:{!! $image_width !!}"
  style="
  background-image: url({{ $bg_desktop }});
  border-top-left-radius:{!! $border_tl !!}%;
  border-bottom-left-radius:{!! $border_bl !!}%;
  border-top-right-radius:{!! $border_tr !!}%;
  border-bottom-right-radius:{!! $border_br !!}%;
  "
  data-mobile="{{ $bg_mobile }}" data-desktop="{{ $bg_desktop }}"></div>
  @if( $content )
  <div class="section__content w-full md:{!! $content_width !!} relative @if($margin_value_left) bg-white border-style-left @endif @if($margin_value_right) bg-white border-style-right @endif"
  style="
  padding: {!! $pad_y !!}px {!! $pad_x !!}px;
  @if($margin_value_left)
  left: {!! $margin_value_left !!}px;
  @endif
  @if($margin_value_right)
  right: {!! $margin_value_right !!}px;
  @endif
  ">
  <div class="section__content__inner @if(!is_admin()){!!$animate !!}@endif {{ $background_color_state }}">
    {!! $content !!}
  </div>
</div>
@endif
</div>

@php $i++ @endphp
@endwhile
@endif
@endif
