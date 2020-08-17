
@if(is_singular('coyote-ranch'))
@php
$specific_type = 'coyote-ranch';
@endphp
@endif

@if(is_singular('tuscany-park'))
@php
$specific_type = 'tuscany-park';
@endphp
@endif

@if(is_singular('cactus-ranch'))
@php
$specific_type = 'cactus-ranch';
@endphp
@endif

@if(is_singular('ranch-rialto'))
@php

$specific_type = 'ranch-rialto';
@endphp
@endif

@if(is_singular('araby-acres'))
@php
$specific_type = 'araby-acres';
@endphp
@endif



@php
$feautred_listing = get_posts([
'post_type'       =>  $specific_type,
'posts_per_page'  => -1,
'meta_key' => 'property_price',
'orderby'  => 'meta_value_num',
'order'	=> 'DESC',
]);
@endphp

<div class="section section--carousel bg-primary-3">
  <div class="container text-center">
    <h1>Similar Listings</h1>
    <div class="js-slingle--slider mb-45">
      @foreach( $feautred_listing as $listings )
      @php
      $field = get_field_object('post_type_selection');
      $value = get_field('post_type_selection');
      $label = $field['choices'][ $value ];
      $property_price = get_field('property_price',$listings->ID);

      $price_format = [
      'Price'     => '$' . number_format( $property_price, 0 ),
      ];

      $amount_of_bathrooms = get_field('amount_of_bathrooms',$listings->ID);
      $amount_of_bedrooms = get_field('amount_of_bedrooms',$listings->ID);
      $featured_img_url = get_the_post_thumbnail_url($listings->ID, 'full');
      @endphp

      <div class="brm-featured--item">
        @if($featured_img_url)
        <div class="column-featured-img">
          <div class="carousel-featured--image" style="background-image: url({!! $featured_img_url !!})"></div>
        </div>
        @endif
        <div class="column-content text-center">
          <h5 class="mb-0">{{ $listings->post_title }}</h5>
          <p>&#36;{!! number_format( $property_price, 0 ) !!} | {!! $amount_of_bedrooms !!} | {!! $amount_of_bathrooms !!}</p>
          <a href="{!! get_permalink($listings->ID) !!}" class="button button--borderless">View Listings</a>
        </div>
      </div>
      @php wp_reset_postdata() @endphp
      @endforeach
    </div>

    <a href="{!! get_permalink(104) !!}" class="button button--primary">View all Listings</a>
  </div>
</div>
