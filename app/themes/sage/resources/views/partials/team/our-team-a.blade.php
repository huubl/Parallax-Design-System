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
'orderby'  => 'date',
'order'	=> 'DESC',
]);
@endphp
@if(is_admin)
<script type="text/javascript" src="/app/themes/sage/resources/assets/scripts/slick.min.js"></script>
@endif
<script type="text/javascript">
jQuery(document).ready( function($){
  $('.js-team--slider').slick({
    accessibility: true,
    adaptiveHeight: false,
    autoplay: true,
    autoplaySpeed: 15000,
    fade: false,
    pauseOnFocus: false,
    pauseOnHover: false,
    speed: 1000,
    slidesToShow: '<?php echo $members_desktop; ?>',
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    nextArrow: '<div class="next"><i class="fas fa-chevron-right"></i></div>',
    prevArrow: '<div class="prev"><i class="fas fa-chevron-left"></i></div>',
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 768,
        settings: {
          centerPadding: '30px',
          centerMode: true,
          slidesToShow: '<?php echo $members_mobile; ?>',
        },
      },
    ],
  });
});
</script>

<div class="team--roster">
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
    @endphp

    <div class="team--members mb-30">
      <div class="column-member-img">
        @if(has_post_thumbnail())
        <div class="member--image" style="background-image: url({!! $featured_img_url !!})"></div>
        @else
        <div class="member--image" style="background-image: url(/app/themes/sage/resources/assets/images/placeholders/team-member.jpg)"></div>
        @endif
      </div>
      <div class="column-content">
        <p class="mb-0"><strong>{{ $members->post_title }}</strong>
        <a href="tel:{{ preg_replace('/[^0-9]/', '', $member_telephone) }}" class="tiny">{!! $member_telephone !!}</a>
        <a href="mailto:{!! $member_email !!}" class="tiny">{!! $member_email !!}</a></p>
      </div>
    </div>
    @php wp_reset_postdata() @endphp
    @endforeach
  </div>
  <a href="" class="mt-15 table mx-auto button button--primary">About Us</a>
</div>
