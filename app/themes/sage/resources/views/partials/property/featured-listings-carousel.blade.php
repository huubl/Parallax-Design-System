@php
// Number of post to show per unit
$post_number = get_field('post_to_show');
$post_to_show_tablet = get_field('post_to_show_tablet');
$post_to_show_mobile = get_field('post_to_show_mobile');
// Content Blurb
$carousel_blurb = get_field('carousel_blurb');
$specific_post_type = get_field('specific_community');
@endphp

@if($specific_post_type)
@php
$feautred_listing = get_posts([
'post_type'       =>  $specific_post_type,
'posts_per_page'  => -1,
'paged'           => (get_query_var('paged')) ? get_query_var('paged') : 1,
'meta_key' => 'property_price',
'orderby'  => 'meta_value_num',
'order'	=> 'DESC',
]);
@endphp
@else
@php
// Post Query and Args
$feautred_listing = get_posts([
'post_type'       =>  'any',
'posts_per_page'  => -1,
'paged'           => (get_query_var('paged')) ? get_query_var('paged') : 1,
'meta_key' => 'property_price',
'orderby'  => 'meta_value_num',
'order'	=> 'DESC',
'tax_query' => array(
'relation' => 'OR',
array (
'taxonomy' => 'properties_featured_coyote',
'field' => 'slug',
'terms' => 'featured',
),
array (
'taxonomy' => 'properties_featured_tuscany',
'field' => 'slug',
'terms' => 'featured',
),
array (
'taxonomy' => 'properties_featured_cactus',
'field' => 'slug',
'terms' => 'featured',
),
array (
'taxonomy' => 'properties_featured_rialto',
'field' => 'slug',
'terms' => 'featured',
),
array (
'taxonomy' => 'properties_featured_araby',
'field' => 'slug',
'terms' => 'featured',
),
),
]);
@endphp
@endif
@if(is_admin)
<script type="text/javascript" src="/app/themes/sage/resources/assets/scripts/slick.min.js"></script>
@endif
<script type="text/javascript">
jQuery(document).ready( function($){
  $('.js-listing--slider').slick({
    accessibility: true,
    adaptiveHeight: false,
    autoplay: true,
    autoplaySpeed: 15000,
    fade: false,
    pauseOnFocus: false,
    pauseOnHover: false,
    speed: 1000,
    slidesToShow: '<?php echo $post_number; ?>',
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    nextArrow: '<div class="next"><i class="fas fa-chevron-right"></i></div>',
    prevArrow: '<div class="prev"><i class="fas fa-chevron-left"></i></div>',
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: '<?php echo $post_to_show_tablet; ?>',
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: '<?php echo $post_to_show_mobile; ?>',
        },
      },
    ],
  });
});
</script>

<div class="brm-featured featured--listings">
  @if($carousel_blurb)
  <div class="content">
    {!! $carousel_blurb !!}
  </div>
  @endif

  <div class="js-listing--slider mt-45">


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
</div>
