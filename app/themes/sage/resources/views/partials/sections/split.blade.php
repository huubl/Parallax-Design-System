@php
// Define background images
$bg_mobile = get_sub_field('section_builder_background')['sizes']['w960x800'];
$bg_desktop = get_sub_field('section_builder_background')['sizes']['w960x800'];

// Background State
$background_state = !empty(get_sub_field('section_builder_background')) ? 'js-background' : null;

// Order State
$order_state = get_sub_field('section_builder_split_flip');

// border radius
$border_tl = get_sub_field('radius_tl');
$border_bl = get_sub_field('radius_bl');
$border_tr = get_sub_field('radius_tr');
$border_br = get_sub_field('radius_br');

// Animation
$animate = get_sub_field('animate_content');
$animation_increment = get_sub_field('animation_increment');

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
@endphp

<section class="section section--{{ $i }} section--{{ $section_state }} {{ $order_state }} {{ $background_color_state }}"
style="
padding: {!! $pad_y !!}px {!! $pad_x !!}px;
"
>
<div class="section__bg {{ $background_state }} w-full md:{!! $image_width !!} bg-cover bg-center"
style="
background-image: url({{ $bg_desktop }});
border-top-left-radius:{!! $border_tl !!}%;
border-bottom-left-radius:{!! $border_bl !!}%;
border-top-right-radius:{!! $border_tr !!}%;
border-bottom-right-radius:{!! $border_br !!}%;
"
data-mobile="{{ $bg_mobile }}" data-desktop="{{ $bg_desktop }}"></div>
@if( $content )
<div class="section__content w-full md:{!! $content_width !!}">
  <div class="section__content__inner @if(!is_admin()){!!$animate !!}@endif">
    {!! $content !!}
  </div>
</div>
@endif
</section>
