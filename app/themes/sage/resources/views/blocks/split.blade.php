{{--
  Title: 2 Column Block
  Description: Produces a row containing two columns with various styling controls
  Category: columns_blocks
  Icon: format-quote
  Keywords: two-column column split
  Mode: preview
  Align: full
  --}}

  @switch( get_field('column_section_width') )
  @case('full')
  @include('partials.columns.split-full', [$options])
  @break
  @case('contained')
  @include('partials.columns.split-contained', [$options])
  @break
  @default
  @break
  @endswitch
