<footer class="footer-type-a z-40 pb-30 md:pt-15 bg-primary-3 w-full" role="contentinfo" aria-label="Footer">
  <div class="w-full container px-0">

    <div class="footer-a">

      <div class="footer__column footer__bottom md:flex md:flex-row md:items-center md:justify-between">

        @if( App::siteSocialLinks() )
        <div class="social_icons w-full md:w-1/3">
          @foreach( App::siteSocialLinks() as $link )
          <a class="social-icon inline-flex items-center justify-center rounded" href="{{ $link['url'] }}" aria-labelledby="{{ strtolower($link['title']) }}">
            <span id="{{ strtolower($link['title']) }}" hidden>{{ $link['title'] }}</span>
            {!! $link['svg'] !!}
          </a>
          @endforeach
        </div>
        @endif

        <div class="w-full md:w-2/3 mt-5 md:mt-0">
          <p class="copyright text-xs">
            <span class="md:inline-block">&copy; {{ date('Y') }} {{ App::siteName() }}</span> &#124;
            <a href="/ada-compliance/">ADA Compliance</a> &#124;
            <a href="/privacy-policy/">Privacy Policy</a>
            &#124; <span>WEBSITE BY <a href="https://www.bigrigmedia.com/outdoor-hospitality-website-development/">BIG RIG MEDIA LLC ®</a></span>
          </p>
        </div>

      </div>
    </div>
  </div>
</footer>
