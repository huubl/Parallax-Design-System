{{--
  Title: Portals
  Description: Add portals to pages within your site.
  Category: general_blocks
  Icon: admin-links
  Keywords: portals
  Mode: preview
  Align: full
  --}}

  @php
  $portal_blurb = get_field('portal_blurb');
  $portal_hover = get_field('hover_excerpt');
  $portal_width = get_field('portal_width');
  $carousel_control = get_field('carousel_control');

  @endphp
  @if(is_admin())
  <script type="text/javascript" src="/app/themes/sage/resources/assets/scripts/slick.min.js"></script>
  @endif

  @if($carousel_control)
  <script type="text/javascript">
  jQuery(document).ready( function($){
    // Handle portals & featured listings
    if (window.matchMedia('(max-width: 1023px)').matches) {
      // Portals Becomes Slider on mobile
      if ($('.js-portals').length) {
        $('.js-portals').slick({
          accessibility: true,
          adaptiveHeight: true,
          autoplay: true,
          autoplaySpeed: 5000,
          arrows: false,
          dots: false,
          fade: false,
          pauseOnFocus: false,
          pauseOnHover: false,
          speed: 1000,
          slidesToShow: 2,
          slidesToScroll: 1,
          responsive: [
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 1,
              },
            },
          ],
        })
      }
    }
  });
  </script>
  @endif

  @if( have_rows('portals') )
  <div id="{{ $block['keywords'][0] }}" class="section section--portals" role="region" aria-label="Portals" style="background-color:<?= get_field('background_color_portal'); ?>">
    <div class="container">
      @if($portal_blurb)
      <div class="content--blurb mb-45">
        {!! $portal_blurb !!}
      </div>
      @endif
      <div class="brm-portals js-portals">
        @while( have_rows('portals') ) @php the_row() @endphp
        @php
        // Define fields
        $image = get_sub_field('portal_image')['sizes']['w465x428'] ?: App\asset_path('images/placeholders/460x328.jpg');
        $title = get_sub_field('portal_title');
        $excerpt = get_sub_field('portal_excerpt');
        $portal_link = get_sub_field('portal_link');
        @endphp
        <div class="portal text-center md:{{ $portal_width }}">

          @switch( $portal_hover )
          @case('design_1')
          <a href="{!! $portal_link !!}">
            <img src="{{ $image }}" alt="{{ $title }}" />
          </a>
          @if( $title )
          <a href="{!! $portal_link !!}">
            <h3>{{ $title }}</h3>
          </a>
          @endif
          {!! apply_filters('the_content', $excerpt) !!}
          @break
          @case('design_2')
          <div class="portal-hover--container">
            <a href="{!! $portal_link !!}">
              <img class="mb-5" src="{{ $image }}" alt="{{ $title }}" />
            </a>
            <div class="hover--state">
              {!! apply_filters('the_content', $excerpt) !!}
              <a class="button button--white" href="{!! $portal_link !!}">Learn More</a>
            </div>
          </div>
          @if( $title )
          <p><a href="{!! $portal_link !!}" class='text-primary-2'>
            {{ $title }}
          </a></p>
          @endif

          @break
          @case('design_3')

          <div class="portal-hover--container design_3">
            <a href="{!! $portal_link !!}">
              <img class="mb-5" src="{{ $image }}" alt="{{ $title }}" />
            </a>
            <div class="hover--state">
              @if( $title )
              <a href="{!! $portal_link !!}" class='portal__a_c'>
                {{ $title }}
              </a>
              @endif

              <div class="hover__content"><a href="{!! $portal_link !!}">{!! apply_filters('the_content', $excerpt) !!}</a>
                <a href="{!! $portal_link !!}" class="button--arrow">Learn More <i class="fas fa-arrow-right"></i></a>
              </div>
            </div>
          </div>
          @break
          @case('design_4')

          <div class="portal-hover--container design_3 design-4 bg-cover bg-center"
          style="
          background-image: url({{ $image }});
          ">
          <a href="{!! $portal_link !!}" class="desktop-none">
            <img class="mb-5" src="{{ $image }}" alt="{{ $title }}" />
          </a>
          <div class="hover--state">

            @if( $title )
            <a href="{!! $portal_link !!}" class='portal__a_c'>
              {{ $title }}
            </a>
            @endif
          </div>
          <div class="hover__content"><a href="{!! $portal_link !!}">{!! apply_filters('the_content', $excerpt) !!}</a>
            <a href="{!! $portal_link !!}" class="button--arrow mt-15">Learn More</a>
          </div>
        </div>
        @break
        @default
        @endswitch
      </div>
      @endwhile
    </div>
  </div>
</div>
@endif
