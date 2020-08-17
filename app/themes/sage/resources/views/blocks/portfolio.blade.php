{{--
  Title: Portfolio
  Description: Display a listing of portfolio items
  Category: general_blocks
  Icon: star-filled
  Keywords: portfolio listing
  Mode: preview
  Align: full
  --}}

  @php
  $member_blurb = get_field('our_team_blurb');

  // Post Query and Args
  $our_team_listing = get_posts([
  'post_type'       =>  'capital-portfolio',
  'posts_per_page'  => -1,
  'paged'           => (get_query_var('paged')) ? get_query_var('paged') : 1,
  'orderby'  => 'date',
  'order'	=> 'DESC',
  ]);

  @endphp


  <div class="section section--portfolio py-60 @if(is_admin() || !is_front_page()) active @endif" role="region" aria-label="Portfolio Listing">

    @if($member_blurb)
    <div class="container">
      <div class="content mb-45">
        {!! $member_blurb !!}
      </div>
    </div>
    @endif

    <div class="portfolio--container">
      <div class="container">
        @foreach( $our_team_listing as $members )
        @php
        $sub_title = get_field('sub_title',$members->ID);
        $city_name_portfolio = get_field('city_name_portfolio',$members->ID);
        $featured_img_url = get_the_post_thumbnail_url($members->ID, 'full');
        $country_portfolio = get_field('country_port',$members->ID);
        @endphp

        <div class="portfolio--listing mb-30">
          <div class="column-member-img">
            @if(has_post_thumbnail($members->ID))
            <a href="#{{ $members->post_name }}" data-fancybox>
              <div class="member--image bg-cover bg-center" style="background-image: url({!! $featured_img_url !!})"></div>
            </a>
            @else
            <a href="{!! get_permalink($members->ID) !!}">
              <div class="member--image bg-cover bg-center" style="background-image: url(/app/themes/sage/resources/assets/images/placeholders/team-member.jpg)"></div>
            </a>
            @endif
          </div>
          <div class="column-content">
            <a href="{!! get_permalink($members->ID) !!}" data-fancybox>
              <h6 class="mb-2">{{ $members->post_title }}</h6>
            </a>
            <p>{!! $member_title !!}</p>
            <p class="mb-0"><strong>{!! $sub_title !!}</strong></p>
            <p class="mb-0">{!! $city_name_portfolio !!}, {!! $country_portfolio !!}</p>
          </div>
        </div>
        @php wp_reset_postdata() @endphp
        @endforeach
      </div>
    </div>
  </div>
