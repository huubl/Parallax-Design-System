{{--
  Title: Need Help
  Description: Display a Help Form to contact admin.
  Category: general_blocks
  Icon: star-filled
  Keywords: portfolio listing
  Mode: preview
  Align: full
  --}}

  @php
  $phone_number = get_field('phone_number', 'option');
  $email = get_field('email', 'option');


  $current_user = wp_get_current_user();
  @endphp


  <div class="section section--investments active mt-45">
    <div class="container container--invest flex justify-between items-start flew-row flex-wrap">
      <div class="fp-bg bg-white md:ml-15"></div>
      <div class="investments--listings px-15 md:px-60 pt-120 w-full md:w-2/3">
        <h1 class="border-top">Need Help?</h1>
        <p class="user__nav">WELCOME {!! $current_user->first_name !!} <span class="px-2">|</span> <a href="/investor-login/">INVESTOR PORTAL</a> <span class="px-2">|</span> <a href="/update-info/">UPDATE MY INFO</a> <span class="px-2">|</span> <a href="{!! wp_logout_url(get_permalink()) !!}">LOGOUT</a></p>

        <div class="table__listings">
          <p>Contact us to request an investor login or for any account help needed.</p>
          @if( $phone_number )
          <a class="block my-15 text-primary-1" href="tel:{{ preg_replace('/[^0-9]/', '', $phone_number) }}"><img src="/app/themes/sage/resources/assets/images/phone-blue.svg" class="inline-block mr-15">{{ $phone_number }}</a>
          @endif

          @if($email)
          <a class="text-primary-1 mb-15" href="mailto:{!! $email !!}"><img src="/app/themes/sage/resources/assets/images/email-blue.svg" class="inline-block mr-15"> {!! $email !!}</a>
          @endif

          {!! do_shortcode('[gravityform id="3" title="false" description="false"]') !!}

        </div>
      </div>

      <div class="investor--contact w-full md:w-1/3 mt-45 md:mt-120">
      </div>
    </div>
  </div>
