@php
$sub_title = get_field('sub_title');
$city_name_portfolio = get_field('city_name_portfolio');
$featured_img_url = get_the_post_thumbnail_url( 'full');
$country_portfolio = get_field('country_port');
$hero_image = get_field('hero_image_port', $post->ID);


@endphp

<section class="section singular--portfolio mt-60 py-45 active">
  <div class="container relative">

    <div class="hero__image--container">
      <div class="hero__image bg-cover bg-center"
      style="
      background-image: url({!! $hero_image !!})"
      >

      @if(!is_user_logged_in())
      <a href="#" class="investor__login">Investor Login <img src="/app/themes/sage/resources/assets/images/arrow-right.svg"></a>
      @endif
    </div>


    <div class="content--inner">
      <h1 class="entry-title text-white border-top">{!! get_the_title() !!}</h1>
      <h5 class="mb-0 text-white">{!! $sub_title !!}</h5>
      <p class="text-white">{!! $city_name_portfolio !!}, {!! $country_portfolio !!}</p>
    </div>

    <div class="float-content mt-90">
      @if(is_user_logged_in())

      @php
      $images = get_field('carousel_slider');
      @endphp

      @if( $images )
      <div class="gallery__carousel mb-45">
        @foreach( $images as $image_id )
        <div class="gallery__image bg-cover bg-top"
        style="background-image: url('{!! $image_id !!}')">
      </div>
      @endforeach
    </div>
    @endif

    @else

    @php
    $images = get_field('public_carousel_slider');
    @endphp

    @if( $images )
    <div class="gallery__carousel mb-45">
      @foreach( $images as $image_id )
      <div class="gallery__image bg-cover bg-top"
      style="background-image: url('{!! $image_id !!}')">
    </div>
    @endforeach
  </div>
  @endif

    @endif

    {!! the_content() !!}

    <div class="key__data">
      <h6>KEY DATA</h6>
      <ul>
        @if( have_rows('key_data') )
        @while( have_rows('key_data') ) @php the_row() @endphp
        @php
        $sub_value = get_sub_field('key_data_note');
        @endphp
        <li>{!! $sub_value !!}</li>
        @endwhile
        @endif
      </ul>
    </div>

    <div class="pdf__dl mt-30">
      @if(is_user_logged_in())

      @if( have_rows('investor_pdf_uploads') )
      @while( have_rows('investor_pdf_uploads') ) @php the_row() @endphp
      @php
      $pdf_label = get_sub_field('pdf_label');
      $pdf_file = get_sub_field('pdf_file');
      @endphp
      <a href="{!! $pdf_file !!}" class="button button--primary" target="_blank"> <img src="/app/themes/sage/resources/assets/images/pdf-icon.svg" class="inline-block pr-2" alt="Download Button Icon"  width="25"> {!! $pdf_label !!}</a>
      @endwhile
      @endif

      @else

      @if( have_rows('public_pdf_uploads') )
      @while( have_rows('public_pdf_uploads') ) @php the_row() @endphp
      @php
      $pdf_label = get_sub_field('pdf_label');
      $pdf_file = get_sub_field('pdf_file');
      @endphp
      <a href="{!! $pdf_file !!}" class="button button--primary" target="_blank"> <img src="/app/themes/sage/resources/assets/images/pdf-icon.svg" class="inline-block pr-2" alt="Download Button Icon"  width="25"> {!! $pdf_label !!}</a>
      @endwhile
      @endif
    </div>

    @endif
  </div>
</div>

</div>
</section>
