<head>
  @if( $tag_manager )
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-{!! $tag_manager !!}');</script>
<!-- End Google Tag Manager -->
@endif
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
@php wp_head() @endphp


<link rel="stylesheet" type="text/css" href="/app/themes/sage/resources/assets/scripts/fullpage/dist/fullpage.css" />

<!-- This following line is optional. Only necessary if you use the option css3:false and you want to use other easing effects rather than "easeInOutCubic". -->
<script src="/app/themes/sage/resources/assets/scripts/fullpage/vendors/easings.min.js"></script>


<!-- This following line is only necessary in the case of using the option `scrollOverflow:true` -->
<script type="text/javascript" src="/app/themes/sage/resources/assets/scripts/fullpage/vendors/scrolloverflow.min.js"></script>

<script type="text/javascript" src="/app/themes/sage/resources/assets/scripts/fullpage/extensions/fullpage.parallax.min.js"></script>

<script type="text/javascript" src="/app/themes/sage/resources/assets/scripts/fullpage/dist/fullpage.extensions.min.js"></script>

</head>
