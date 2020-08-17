{{--
  Title: Column Builder
  Description: Produce a varying amount of columns with different width percentages.
  Category: columns_blocks
  Icon: format-quote
  Keywords: column-builder
  Mode: preview
  Align: full
  --}}

@php
  $sectionbg = get_field('section_background_color');

  /* Paddings for desktop and mobile */
  $sectionpx = get_field('section_padding_x');
  $sectionpy = get_field('section_padding_y');

  $mobilepx = get_field('mobile_padding_x');
  $mobilepy = get_field('mobile_padding_y');

  /* Setting for flex shorthand followed by spacing settings dependent on the chosen option */
  $flexstyle =  get_field('flex_shorthand') ? 'flex-auto' : '';

  /* Will set vertical and horizontal spacing for columns and if applicable the flex justification */
  $horizontalspacing = get_field('horizontal_spacing') ? get_field('horizontal_spacing')/2 : '';
  $verticalspacing = get_field('vertical_spacing') ? get_field('vertical_spacing') : '';
  $flexjustify = (get_field('flex_justify') && !get_field('flex_shorthand')) ? get_field('flex_justify') : '' ;

  /* Minimum height for columns */
  $mincolheight = get_field('min_height') ? get_field('min_height') : '200' ;
@endphp

<div class="section section--c-builder px-{{ $mobilepx }} py-{{ $mobilepy }} md:px-{{ $sectionpx }} md:py-{{ $sectionpy }} {{ $sectionbg }}">
  <div class="column-container {{ $flexjustify }}">
    @while(have_rows('columns'))
    @php
      the_row();

      /* Column width and content */
      $colwidth = get_sub_field('width');
      $colcontent = get_sub_field('column_content');

      /* Column content padding */
      $colpx = get_sub_field('column_padding_x');
      $colpy = get_sub_field('column_padding_y');

      /* Column background option */
      $bgtype = get_sub_field('background_image') && get_sub_field('background_type') == 'image' ? 'js-background' : get_sub_field('background_color');
      $desktopbg = get_sub_field('background_image')['sizes']['w1920x800'];
      $mobilebg = get_sub_field('background_image')['sizes']['w960x800'];
    @endphp

    <div class="column pb-{{ $verticalspacing }} pb-{{ $verticalspacing }} md:pb-0 {{ $flexstyle }}"
    style="
    width:{{ $colwidth }}%;
    padding-left: {{ $horizontalspacing }}px;
    padding-right: {{ $horizontalspacing }}px;
    ">
      <div class="column__content {{ $bgtype }} px-{{ $colpx }} py-{{ $colpy }}"
      data-mobile="{{ $mobilebg }}"
      data-desktop="{{ $desktopbg }}"
      style="min-height:{{ $mincolheight }}px">
        {!! $colcontent !!}
      </div>
    </div>
    @endwhile
  </div>
</div>
