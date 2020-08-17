@php
// Number of post to show per unit
$members_desktop = get_field('members_desktop');
$members_tablet = get_field('members_tablet');
$members_mobile = get_field('members_mobile');
// Content Blurb
$member_blurb = get_field('our_team_blurb');
// Post Query and Args
$our_team_listing = get_posts([
'post_type'       =>  'member-title',
'posts_per_page'  => -1,
'paged'           => (get_query_var('paged')) ? get_query_var('paged') : 1,
'orderby' => 'date',
'order'    => 'ASC',
]);
@endphp

@if(is_admin)
<script type="text/javascript" src="/app/themes/sage/resources/assets/scripts/slick.min.js"></script>
@endif


<div class="team--roster-b py-45">
  @if($member_blurb)
  <div class="content mb-45">
    {!! $member_blurb !!}
  </div>
  @endif

  <div class="js-team--slider">
    @foreach( $our_team_listing as $members )
    @php
    $member_telephone = get_field('member_phone_number',$members->ID);
    $member_email = get_field('member_email_address',$members->ID);
    $featured_img_url = get_the_post_thumbnail_url($members->ID, 'full');
    $member_title = get_field('position_tittle',$members->ID);

    @endphp

    <div class="team--members mb-30">
      <div class="column-member-img">
        @if(has_post_thumbnail($members->ID))
        <a href="#{{ $members->post_name }}" data-fancybox>
          <div class="member--image" style="background-image: url({!! $featured_img_url !!})"></div>
        </a>
        @else
        <a href="#{{ $members->post_name }}" data-fancybox>
          <div class="member--image" style="background-image: url(/app/themes/sage/resources/assets/images/placeholders/team-member.jpg)"></div>
        </a>

        @endif
      </div>
      <div class="column-content">
        <a href="#{{ $members->post_name }}" data-fancybox>
          <h6 class="mb-2">{{ $members->post_title }}</h6>
        </a>
        <p><strong>{!! $member_title !!}</strong></p>
      </div>

      <div id="{{ $members->post_name }}" class="hidden fancy-content">
        <div class="fancy-box--inner">
          @if(has_post_thumbnail($members->ID))
          <div class="member--image" style="background-image: url({!! $featured_img_url !!})"></div>
          @else
          <div class="member--image" style="background-image: url(/app/themes/sage/resources/assets/images/placeholders/team-member.jpg)"></div>
          @endif

          <div class="member--bio p-15 md:p-60">
            <h6 class="mb-2">{{ $members->post_title }}</h6>
          </a>
          <p class="mb-15"><strong>{!! $member_title !!}</strong></p>
          <p>{!! $members->post_content; !!}</p>
        </div>
      </div>
    </div>
  </div>

  @php wp_reset_postdata() @endphp
  @endforeach
</div>
</div>
