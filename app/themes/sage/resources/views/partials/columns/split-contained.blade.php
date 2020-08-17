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
$image_height = get_sub_field('image_height');
$content_width = get_sub_field('content_section_width');

// Background Color State
$background_color_state = get_sub_field('section_builder_background_color');

// Content
$content = get_sub_field('section_builder_content');

// Animation
$animate = get_sub_field('animate_content');

@endphp


<div class="section section--split @if(is_admin()|| !is_front_page()) active @endif"
style="
padding: {!! $pad_y !!}px {!! $pad_x !!}px;
"
>
  <div class="container {{ $order_state }} md:flex md:justify-between md:items-center md: flex-row">
  <div class="section__bg {{ $background_state }} md:{!! $image_width !!}"
  style="
  min-height: {!! $image_height !!}vh;
  "
  >
  <div class="fp-bg"
  style="
  background-image: url({{ $bg_desktop }});
  min-height: {!! $image_height !!}vh;
  "></div>
</div>
  @if( $content )
  <div class="section__content w-full md:{!! $content_width !!}  relative @if($margin_value_left) bg-white border-style-left @endif @if($margin_value_right) bg-white border-style-right @endif @if(!is_admin()){!!$animate !!}@endif"
  style="
  @if($margin_value_left)
  left: {!! $margin_value_left !!}px;
  @endif
  @if($margin_value_right)
  right: {!! $margin_value_right !!}px;
  @endif
  ">
  <div class="section__content__inner {{ $background_color_state }} p-30 md:p-45">
    {!! $content !!}
  </div>
</div>
@endif
</div>
</div>

@php $i++ @endphp
@endwhile
@endif
@endif
