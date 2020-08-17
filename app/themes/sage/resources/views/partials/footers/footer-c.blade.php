@php
$ft_bg_clr = get_field('footer_background_color','options');
$background_state = !empty(get_field('footer_background_color','options')) ? 'text-white' : null;
$company_logo = get_field('company_logo','options');
@endphp

<footer class="footer-c relative z-40" role="contentinfo" aria-label="Footer">
  <div class="container">
    <p class="copyright text-xs text-left">
      <span class="md:inline-block">&copy; {{ date('Y') }} {{ App::siteName() }}</span>
      <a href="/ada-compliance/">&#124; ADA Compliance</a>
      <a href="/privacy-policy/">&#124; Privacy Policy</a>
      <span>&#124; WEBSITE BY <a href="https://www.bigrigmedia.com/custom-website-development/">BIG RIG MEDIA LLC ®</a></span>
    </p>
  </div>
</footer>
