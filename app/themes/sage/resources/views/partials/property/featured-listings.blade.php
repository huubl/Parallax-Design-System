@php
$listings_cnt = get_field('post_count');
$post_type_selection = get_field('post_type_selection');
$margin_value = get_field('margin_value');


$posts = get_posts([
'post_type'       => $post_type_selection,
'posts_per_page'  => 1,
'paged'           => (get_query_var('paged')) ? get_query_var('paged') : 1,
'meta_key' => 'property_price',
'orderby'  => 'meta_value_num',
'order'	=> 'DESC'
]);
@endphp

@if(is_admin())
<script type="text/javascript" src="/app/themes/sage/resources/assets/scripts/slick.min.js"></script>
@endif

<script type="text/javascript">

jQuery(document).ready( function($){

$('.js-carousel-featured').slick({
  accessibility: true,
  adaptiveHeight: true,
  autoplay: true,
  autoplaySpeed: 15000,
  fade: true,
  pauseOnFocus: false,
  pauseOnHover: false,
  speed: 1000,
  slidesToShow: 1,
  slidesToScroll: 1,
  dots: false,
  arrows: true,
  nextArrow: '<div class="next"><i class="fas fa-chevron-right"></i></div>',
  prevArrow: '<div class="prev"><i class="fas fa-chevron-left"></i></div>',
});
});

</script>


<div class="brm-featured-listings">
  @foreach( $posts as $listing )

  @php
  $field = get_field_object('post_type_selection');
  $value = get_field('post_type_selection');
  $label = $field['choices'][ $value ];

  $community_type = get_field('property_community_type',$listing->ID);
  $street_address = get_field('street_address', $listing->ID);
  $street_city = get_field('property_city',$listing->ID);
  $state_location = get_field('property_state', $listing->ID);
  $property_zipcode = get_field('property_zipcode', $listing->ID);
  $gallery = get_field('property_gallery', $listing->ID);

  @endphp

  <div class="brm-featured-listing" style="margin-top: {!! $margin_value !!}px ;">
    <div class="column w-full h-full md:w-1/2 js-carousel-featured relative">

      @if ( $gallery )
      @php foreach ( $gallery as $gallery_item ) { @endphp
        <div class="featured__image" style="background-image: url({!! $gallery_item['sizes']['w960x562'] !!})"></div>
        @php } @endphp
        @endif
      </div>
      <div class="column w-full md:w-1/2 py-30 px-15 md:px-45 bg-white">
        <small class="small-style">Featured Listing</small>
        <h1 class="mb-2">{!! $label !!} {{ $listing->post_title }} {{ $community_type }}</h1>
        <small class="featured-style">{!! $street_address !!}<br>
          {!! $street_city !!}, {!! $state_location !!} {!! $property_zipcode !!}</small>

          <p>{!! $listing->post_excerpt !!}</p>
          <a href="" class="button button--primary">View Full Listings</a>
        </div>
      </div>
      @php wp_reset_postdata() @endphp
      @endforeach
    </div>
