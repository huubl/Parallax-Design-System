@php
// Define background images
$bg_mobile = get_sub_field('section_builder_background')['sizes']['w960x800'];
$bg_desktop = get_sub_field('section_builder_background')['sizes']['w960x800'];

// Background State
$background_state = !empty(get_sub_field('section_builder_background')) ? 'js-background' : null;

// Order State
$order_state = get_sub_field('section_builder_split_flip');

// Background Color State
$background_color_state = get_sub_field('section_builder_background_color');

// Content
$content = get_sub_field('section_builder_content');

// Section Padding
$pad_y = get_sub_field('section_padding_y');
$pad_x = get_sub_field('section_padding_x');

// Animation
$animate = get_sub_field('animate_content');

@endphp
<section class="section--{{ $i }} section--{{ $section_state }} {{ $order_state }}"
style="
padding: {!! $pad_y !!}px {!! $pad_x !!}px;
"
>
  <div class="container flex justify-between">

    <div class="section__bg {{ $background_state }} w-full md:w-1/2 bg-cover bg-no-repeat bg-center" style="background-image: url({{ $bg_mobile }})" data-mobile="{{ $bg_mobile }}" data-desktop="{{ $bg_desktop }}"></div>
    @if( $content )
    <div class="section__content w-full md:w-1/2 flex items-center justify-center bg-cover">
      <div class="section__content__inner {{ $background_color_state }} @if(!is_admin()){!!$animate !!}@endif">
        {!! $content !!}
      </div>
    </div>
    @endif

  </div>
</section>
