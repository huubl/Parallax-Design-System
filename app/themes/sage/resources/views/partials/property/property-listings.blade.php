@php
// Post Query and Args
$all_listing = new WP_Query([
'post_type'       =>  array('coyote-ranch','tuscany-park','cactus-ranch','ranch-rialto','araby-acres'),
'posts_per_page'  => 15,
'paged'           => (get_query_var('paged')) ? get_query_var('paged') : 1,
'orderby'  => 'date',
'order'	=> 'DESC',
]);
@endphp

@if (isset($_GET))
@php
$search_term = [];
$search_terms = [];
$relation = [
'relation' => 'AND'
];
@endphp

@foreach($_GET as $key => $value)
@if($key)
@php
$search_term['taxonomy'] = $key;
$search_term['terms']       = $value;
$search_term['field']       = 'slug';
$search_terms[]             = $search_term;
@endphp
@endif
@endforeach

@if(!empty($search_terms))
@php
$all_listing = new WP_Query([
'post_type' => $_GET['post_type_name'],
'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
'posts_per_page'  => 15,
'paged'           => (get_query_var('paged')) ? get_query_var('paged') : 1,
'orderby'  => 'date',
'order'	=> 'DESC',
]);
@endphp
@endif

@endif

<h1 class="text-center mb-30">Listings</h1>

<form class="form form--simple" action="<?= get_permalink(104); ?>" method="get" role="search">
  <label hidden>Filter By Community</label>
  <select name="post_type_name" id="drop-list">
    <option value="" disabled selected>Filter By Community</option>
    <option value="coyote-ranch"
    <?php if ($_GET['post_type_name'] == 'coyote-ranch') { ?>selected="true" <?php }; ?>>
    Coyote Ranch MHC
  </option>

  <option value="tuscany-park"
  <?php if ($_GET['post_type_name'] == 'tuscany-park') { ?>selected="true" <?php }; ?>>
  Tuscany MH Park
</option>

<option value="cactus-ranch"
<?php if ($_GET['post_type_name'] == 'cactus-ranch') { ?>selected="true" <?php }; ?>>
Mt. Cactus Ranch
</option>

<option value="ranch-rialto"
<?php if ($_GET['post_type_name'] == 'ranch-rialto') { ?>selected="true" <?php }; ?>>
Ranch Rialto
</option>

<option value="araby-acres"
<?php if ($_GET['post_type_name'] == 'araby-acres') { ?>selected="true" <?php }; ?>>
Araby Acres
</option>
</select>
<input type="submit" value="Search" class="button button--primary">
</form>


<div class="brm-featured property--container">
  @while ($all_listing->have_posts()) @php $all_listing->the_post(); @endphp

  @php
  $property_price = get_post_field('property_price');
  $amount_of_bathrooms = get_post_field('amount_of_bathrooms');
  $amount_of_bedrooms = get_post_field('amount_of_bedrooms');
  $featured_img_url = get_the_post_thumbnail_url();
  $postType = get_post_type_object(get_post_type());
  @endphp


  <div class="property--item">
    @if($featured_img_url)
    <div class="column-property-img">
      <div class="property--image" style="background-image: url({!! $featured_img_url !!})"></div>
    </div>
    @endif
    <div class="column-content text-center">
      <h5 class="mb-0">{{ the_title() }}</h5>
      <p>{!! esc_html($postType->labels->singular_name) !!} | &#36;{!! number_format( $property_price, 0 ) !!} | {!! $amount_of_bedrooms !!} | {!! $amount_of_bathrooms !!}</p>
      <a href="{!! get_permalink() !!}" class="button button--borderless">View Listings</a>
    </div>
  </div>
  @endwhile
  @php wp_reset_postdata() @endphp

  <?php if ($all_listing->max_num_pages > 1) {    ?>
    <div class="result-pagination">
      <?php  $big = 999999999; // need an unlikely integer
      echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $all_listing->max_num_pages,
        'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
      ) );
      wp_reset_postdata();?>
    </div>
  <?php } ?>
</div>
