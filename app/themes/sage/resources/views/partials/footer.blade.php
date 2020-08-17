@if( class_exists('ACF') )
@switch( get_field('footer_component', 'option') )
@case('footer-a')
@include('partials.footers.footer-a')
@break
@case('footer-b')
@include('partials.footers.footer-b')
@break
@case('footer-c')
@include('partials.footers.footer-c')
@break
@default
Nothing Yet
@break
@endswitch
@endif
