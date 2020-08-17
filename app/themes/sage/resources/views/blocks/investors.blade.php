{{--
  Title: Investor Column
  Description: Produces a row containg 2 columns one of whichc is floating above the other.
  Category: general_blocks
  Icon: format-quote
  Keywords: Float column
  Mode: preview
  Align: full
  --}}


  @if(!is_user_logged_in())
  @include('partials.capital.login-form')
  @else
  @include('partials.capital.investor-listing')
  @endif
