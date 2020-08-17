@php
$iframe = get_field('google_map_api', 'options');
$address = get_field('address1', 'options');
$city = get_field('city', 'options');
$state = get_field('state', 'options');
$zip = get_field('zipcode', 'options');
$phone = get_field('phone_number', 'options');
$email = get_field('email', 'options');
$contact_content = get_field('contact_content', 'options');
$contact_hours = get_field('contact_hours', 'options');
@endphp

<div class="section container flex justify-between items-start md:pr-15">
  <div class="contact__content mb-15 md:mb-0 w-full md:w-1/2">
    {!! $contact_content !!}
  </div>

  <div class="contact__info w-full md:w-1/2 md:pl-15">
    <div itemscope itemtype="http://schema.org/LocalBusiness">
      <p itemprop="name"><strong>Contact Us</strong></p>
      <address itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
        <span itemprop="streetAddress">{!! $address !!}</span>
        <span itemprop="addressLocality">{!! $city !!}</span>,
        <span itemprop="addressRegion">{!! $state !!}</span>
        <span itemprop="postalCode">{!! $zip !!}</span>
      </address>
      <p class="contact-info--email my-30">
        <a itemprop="email" href="mailto:{!! $email !!}">{!! $email !!}</a>
      </p>
    </div>

    <div class="contact__hours my-30">
      @if($contact_hours)
      {!! $contact_hours !!}
      @endif
    </div>

    @if( App::siteSocialLinks() )
    <div class="social__media">
      @foreach( App::siteSocialLinks() as $link )
      <a class="social-icon inline-flex items-center justify-center w-icon h-icon rounded" href="{{ $link['url'] }}" aria-labelledby="{{ strtolower($link['title']) }}">
        <span id="{{ strtolower($link['title']) }}" hidden>{{ $link['title'] }}</span>
        {!! $link['svg'] !!}
      </a>
      @endforeach
      @endif
    </div>

  </div>
</div>
