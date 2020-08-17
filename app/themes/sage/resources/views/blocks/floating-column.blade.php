{{--
  Title: Floating Column
  Description: Produces a row containg 2 columns one of whichc is floating above the other.
  Category: columns_blocks
  Icon: format-quote
  Keywords: Float column
  Mode: preview
  Align: full
  --}}

  @php
  // Define background images
  $bg_image = get_field('floating_image')['sizes']['w1920x800'];
  $width = get_field('background_width');
  $height = get_field('background_height');
  $location = get_field('background_location');
  $display_footer = get_field('display_footer');

  $column_justification = get_field('column_justification');
  $align_justification = get_field('align_justification');


  @endphp

  <div class="section section--float {{ $background_color_state }} @if(is_admin() || !is_front_page()) active @endif">
    <div class="container relative px-0 md:px-15">
      <div class="section__bg absolute block mx-auto {!! $location !!}"
      style="
      width: {!! $width !!}%;
      max-width: 98%;
      min-height: {!! $height !!}vh;
      left: 0;
      right: 0;
      ">
      <div class="fp-bg" style="background-image: url({{ $bg_image }});"></div>
    </div>

    @if( have_rows('written_content') )
    <div class="content flex"
    style="
    align-items: {!! $align_justification !!};
    justify-content: {!! $column_justification !!};
    min-height: {!! $height !!}vh;
    ">
    @while( have_rows('written_content') ) @php the_row() @endphp
    @php
    // Column Height
    $column_height = get_sub_field('column_height');

    // Content
    $content = get_sub_field('write_content_here');
    $content_location = get_sub_field('content_location');


    // Section Padding
    $pad_t = get_sub_field('column_padding_top');
    $pad_b = get_sub_field('column_padding_bottom');
    $pad_x = get_sub_field('column_padding_x');
    $mt = get_sub_field('float_magin_top');
    $white_text = get_sub_field('white_text');
    $column_height_mobile = get_sub_field('column_height_mobile');


    // Background Color State
    $background_color = get_sub_field('background_color_float');

    // properties
    $column_width = get_sub_field('column_width');
    $column_height = get_sub_field('column_height');

    // Animation
    $animate = get_sub_field('animation_type');

    @endphp
    <div class="content--inner bloxk mx-auto {!! $white_text !!} {!! $background_color !!} {!! $content_location !!} {!! $animate !!}"
    style="
    padding: 0 {!! $pad_x !!}px;
    padding-top: {!! $pad_t !!}px;
    padding-bottom: {!! $pad_b !!}px;
    min-height: {!! $column_height !!}vh;
    width: {!! $column_width !!}%;
    margin-top: {!! $mt !!}px;
    ">
    {!! $content !!}
  </div>
  @endwhile

  @if($display_footer)
  @include('partials.footers.footer-a')
  @endif

</div>
@endif

</div>

</div>
