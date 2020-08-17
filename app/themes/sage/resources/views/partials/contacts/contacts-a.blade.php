@php
$iframe = get_field('google_map_api', 'options');
$address = get_field('address1', 'options');
$city = get_field('city', 'options');
$state = get_field('state', 'options');
$zip = get_field('zipcode', 'options');
$phone = get_field('phone_number', 'options');
$email = get_field('email', 'options');
$testimonial_sizes = get_field('testimonial_size', 'options');
// Section Padding
$c_pad_y = get_field('contact_padding_y', 'options');
$c_pad_x = get_field('contact_padding_x', 'options');
$contact_name = get_field('contact_name', 'options');
$contact_hours = get_field('contact_hours', 'options');
$contact_us = get_field('contact_button_url', 'options');

@endphp
<div class="section container max-{!! $testimonial_sizes !!}"
style="
background-image:url({{ $bg_desktop }});
padding: {!! $c_pad_y !!}px {!! $c_pad_x !!}px;
"
>

<div class="contact-info mb-30 md:mb-0">
  <div itemscope itemtype="http://schema.org/LocalBusiness" class="contact--inner">
    <p itemprop="name" class="site__title"><strong>{!! get_bloginfo() !!}</strong></p>
    <address itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
      <span itemprop="streetAddress">{!! $address !!}</span>
      <span itemprop="addressLocality">{!! $city !!}</span>,
      <span itemprop="addressRegion">{!! $state !!}</span>
      <span itemprop="postalCode">{!! $zip !!}</span>
    </address>
    <p class="contact-info--tel mt-3">
      <a itemprop="telephone" href="tel:'.preg_replace('/[^0-9]/', '', $phone).'">{!! $phone !!}</a>
    </p>

    @if($email)
    <p class="contact-info--email">
      <a itemprop="email" href="mailto:{!! $email !!}">
        @if($contact_name)
        {!! $contact_name !!}<br>
        @endif
        {!! $email !!}</a>
      </p>
      @endif

      @if($contact_hours)
      {!! $contact_hours !!}
      @endif

      @if($contact_us)
      <a href="{!! get_permalink(195) !!}" class="button button--secondary">Contact Us</a>
      @endif
    </div>
  </div>
  <iframe  class="max-w-full" src="{{$iframe}}" width="700" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

</div>
