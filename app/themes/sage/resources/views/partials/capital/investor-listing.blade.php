@php
$phone_number = get_field('phone_number', 'option');
$email = get_field('email', 'option');


global $current_user;

$the_query = new WP_Query([
'post_type'       => 'capital-portfolio',
'posts_per_page'  => -1,
'paged'           => (get_query_var('paged')) ? get_query_var('paged') : 1,
'order'	=> 'DESC',

'meta_query' => array(
	'relation' => 'OR',
	array(
		'key'     => 'assigned_agent',
		'value'   => $current_user->user_login,
		'compare' => 'LIKE'
	)),
]);
@endphp


<div class="section section--investments active mt-45">
  <div class="container container--invest flex justify-between items-start flew-row flex-wrap">
    <div class="fp-bg bg-white md:ml-15"></div>
    <div class="investments--listings px-15 md:px-60 pt-120 w-full md:w-2/3">
      <h1 class="border-top">investment projects</h1>
      <p class="user__nav">WELCOME {!! $current_user->first_name !!} <span class="px-2">|</span> <a href="/update-info/">UPDATE MY INFO</a> <span class="px-2">|</span> <a href="{!! wp_logout_url(get_permalink()) !!}">LOGOUT</a></p>

<div class="table__listings">

<div class="table__header px-0 py-15 md:px-0 md:py-15 flex justify-between items-start border-b-2 mt-75 bg-white">
  <div class="table__header--title w-1/4">
    <h6 class="mb-0">Project</h6>
  </div>
  <div class="table__header--description w-1/2">
    <h6 class="mb-0">Description</h6>
  </div>
  <div class="table__header--location w-1/4">
    <h6 class="mb-0">Location</h6>
  </div>
</div>

      @while ( $the_query->have_posts() )  @php $the_query->the_post() @endphp

      @php
      $desc = get_post_field('sub_title');
      $loc = get_post_field('city_name_portfolio');
			$loc_s = get_post_field('country_port');
      @endphp

      <div class="table__body flex justify-between items-start bg-white">
        <div class="table__body--title w-1/4 py-15 md:pr-2">
          <p class="mb-0"><a href="{!! get_permalink() !!}">{{ the_title() }}</p>
        </div>
        <div class="table__body--description w-1/2 py-15 md:pr-2">
          <p class="mb-0"><a href="{!! get_permalink() !!}">{!! $desc !!}</a></p>
        </div>
        <div class="table__body--location w-1/4 py-15 md:pr-2">
          <p class="mb-0"><a href="{!! get_permalink() !!}">{!! $loc !!}, {!! $loc_s !!}</a></p>
        </div>
      </div>
      @endwhile
    </div>

    </div>

    <div class="investor--contact w-full md:w-1/3 p-30 md:p-45 bg-primary-2 mt-45 md:mt-120">
      <h5>Contact 1839</h5>
      @if( $phone_number )
      <a class="block my-15 text-white" href="tel:{{ preg_replace('/[^0-9]/', '', $phone_number) }}"><img src="/app/themes/sage/resources/assets/images/tele-right.svg" class="inline-block mr-15">{{ $phone_number }}</a>
      @endif

      @if($email)
      <a class="text-white" href="mailto:{!! $email !!}"><img src="/app/themes/sage/resources/assets/images/email.svg" class="inline-block mr-15"> {!! $email !!}</a>
      @endif


      {!! do_shortcode('[gravityform id="1" title="false" description="false"]') !!}
    </div>
  </div>
</div>
