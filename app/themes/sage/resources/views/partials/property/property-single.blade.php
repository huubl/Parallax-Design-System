@php
$phone = get_field('sales_agent_phone_number');
$phone_link = preg_replace('/[^0-9]/', '', $phone);
$bedrooms = get_field('amount_of_bedrooms');
$bathrooms = get_field('amount_of_bathrooms');
$number = get_field('property_number');
$reduced = get_field('property_reduced');
$address = get_field('property_address');
$street_address = get_field('street_address');
$city_address = get_field('property_city');
$state_address = get_field('property_state');
$zipcode_address = get_field('property_zipcode');

$price = get_field('property_price');
$phone_property = get_field('property_phone');
$gallery = get_field('property_gallery');
$property_n = get_field( 'property_number' );
$promotion = get_field('property_promotion');
$make = get_field('make_name');
$status = get_field('property_status');
$community = get_field('property_community_type');
$purchase = get_field('property_purchase_type');
$year_built = get_field('property_year_built');
$square_feet  			= get_field('property_square_feet');

$details = [
'Status'    => $status,
'Listing Number'    => $number,
'Price'     => '$' . number_format( $price, 0 ),
'Make'    => $make,
'Address'   => "$street_address $city_address, $state_address $zipcode_address",
'Community'   => $community,
'Purchase Type'   => $purchase,
'Year Built'   => $year_built,
'Square Feet'   => $square_feet,
'Phone'     => $phone_property,
];

$class = $reduced === 'yes' ? 'has-4' : 'has-3';

// Meta
$tagline            = get_field('property_tagline');
$promotion          = get_field('property_promotion');
$status             = get_field('property_status');
$community          = get_field('property_community_type');
$purchase           = get_field('property_purchase_type');
$square_feet        = get_field('property_square_feet');
$property_brochure  = get_field('property_brochure');
$property_plan      = get_field('property_floor_plan');

@endphp

<div class="property">
  <div class="container">
    <h1 class="property__title tac"><?php the_title(); ?></h1>

    @if ($property_n)
    <p style="text-align:center;margin:0px;">Listing #: {!! $property_n !!}</p>
    @endif

    <div class="property__meta md:flex md:flex-row md:justify-center <?= $class; ?>">

      @if ( $reduced === 'yes' )
      <span class="ttu">Just Reduced!</span>
      @endif

      @if ( $price )
      <span>&#36;<?= number_format( $price, 0 ); ?></span>
      @endif

      @if ( $bedrooms )
      <span>BR: {!! $bedrooms !!}</span>
      @endif

      @if ( $bathrooms )
      <span>BA: {!! $bathrooms !!}</span>
      @endif

    </div>

    @if($promotion)
    <h4 style="text-align:center;">{!! $promotion !!}</h4>
    @endif

    <div class="property__content">
      <div class="property__gallery">

        @include('partials.property.property-content')

        <!-- Contact Form -->
        <div class="property__contact">
          <div class="property__contact--agents bg-primary-2 p-15">
            @include('partials.property.property-contact')
          </div>

          <div class="property__contact--form bg-primary-1 p-15">
            {!! do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]') !!}
          </div>
        </div>
      </div>
      <ul class="flex flex-row items-center justify-between mt-15 mb-45">
        <li>{!! previous_post_link( '%link','Previous Listing' ) !!}</li>
        <li><a

          @if(is_singular('coyote-ranch'))
          href="{!! get_permalink(364) !!}"
          @endif

          @if(is_singular('tuscany-park'))
          href="{!! get_permalink(366) !!}"
          @endif

          @if(is_singular('cactus-ranch'))
          href="{!! get_permalink(368) !!}"
          @endif

          @if(is_singular('ranch-rialto'))
          href="{!! get_permalink(370) !!}"
          @endif

          @if(is_singular('araby-acres'))
          href="{!! get_permalink(372) !!}"
          @endif

          class="all-posts">  All Listings</a></li>

          <li>{!! next_post_link( '%link','Next Listing' ) !!}</li>
        </ul>
      </div>
    </div>
  </div>

  @include('partials.property.single-slider')
  @include('partials.property.single-cta')
