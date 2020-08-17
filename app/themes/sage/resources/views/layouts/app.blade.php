<!doctype html>
<html {!! get_language_attributes() !!}>
@include('partials.head')
@php
$header_fixed = get_field('fixed_position','options');
@endphp

<body @php body_class() @endphp id="{!! $header_fixed !!}">
  @if( $tag_manager )
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-{!! $tag_manager !!}"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @endif
    @php do_action('get_header') @endphp
    @include('partials.header')
    @if(App\display_layout())
    <div id="fullpage">
      @yield('content')
    </div>
    @if(is_front_page())
    <div class="fixed--nav">
      <a id="moveUp" class="float-nav prev"><img src="/app/themes/sage/resources/assets/images/arrow-down.svg"></a>
      <a id="moveDown" class="float-nav next"><img src="/app/themes/sage/resources/assets/images/arrow-down.svg"></a>
    </div>
    @endif

    @else
    @yield('content')
    @endif
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp


    @if(is_front_page())
    <script type="text/javascript">

    jQuery(document).ready( function($){

      //adding the action to the button
      $(document).on('click', '#moveDown', function(){
        fullpage_api.moveSectionDown();
      });

      $(document).on('click', '#moveUp', function(){
        fullpage_api.moveSectionUp();
      });

    });

    var myFullpage = new fullpage('#fullpage', {
      //Navigation
      navigation: false,
      navigationPosition: 'right',
      navigationTooltips: ['firstSlide', 'secondSlide'],
      showActiveTooltip: false,
      slidesNavigation: false,
      slidesNavPosition: 'bottom',

      //Scrolling
      css3: true,
      scrollingSpeed: 1000,
      autoScrolling: true,
      scrollBar: false,
      easing: 'easeInOutCubic',
      easingcss3: 'ease',
      normalScrollElements: '#element1, .element2',
      touchSensitivity: 5,
      dragAndMove: true,
      bigSectionsDestination: null,

      //Accessibility
      keyboardScrolling: true,

      //Design
      controlArrows: true,
      verticalCentered: false,
      responsiveWidth: 0,
      responsiveHeight: 0,
      parallax: true,
      parallaxKey: 'MTgzOWNhcGl0YWwuYmlncmlnbWVkaWEuY29tX3o2SWNHRnlZV3hzWVhnPTEzOA==',
      parallaxOptions: {type: 'reveal', percentage: 90, property: 'translate'},
      //Custom selectors
      sectionSelector: '.section',
      slideSelector: '.slide',
      lazyLoading: false,
      licenseKey: 'F2BE5856-FBCA46D7-9DB28AEB-30BC1BB6',
    });


    </script>
    @endif

  </body>
  </html>
