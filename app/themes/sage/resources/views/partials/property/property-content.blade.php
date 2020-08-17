@if ( $gallery )
<div class="property__gallery__large js-carousel-gallery">
  @php foreach ( $gallery as $gallery_item ) { @endphp
    <div class="property__gallery__item">
      <img src="{!! $gallery_item['sizes']['w960x562'] !!}">
    </div>
    @php } @endphp
  </div>

  <div class="property__gallery__nav js-carousel-nav">
    @php foreach ( $gallery as $gallery_item ) { @endphp
      <div class="property__gallery__item">
        <img src="{!! $gallery_item['sizes']['w465x428'] !!}">
      </div>
      @php } @endphp
    </div>
    @endif

    <!---   details  --->
    <div class="property__description mt-30">

      @if ( $reduced === 'yes' )
      <div class="property__reduced">
        <h2>Just Reduced!</h2>
      </div>
      @endif

      <div class="property__left">

        @if($property_plan || $property_brochure)
        <div>
          <div class="property-documents">
            <h5>Available Property Documents:</h5>

            @if($property_plan)
            <p><a href="{!! $property_plan !!}" class="btn btn-o" target="_blank">View Floor Plan</a></p>
            @endif

            @if($property_brochure)
            <p><a class="btn btn-o" href="{!! $property_brochure !!}" target="_blank">View Brochure</a></p>
            @endif

            <hr>
          </div>
          @endif

          @if ( $details )
          <ul class="property__details">
            @php foreach ( $details as $key => $detail ) { @endphp
              @if ( $detail )
              <li class="property__detail">
                @if ( $key !== 'number' )
                <span class="ttu mr-1"><strong><?= $key; ?>:</strong></span>
                @else
                <span class="ttu mr-1"><strong>Listing <?= $key; ?>:</strong></span>
                @endif
                <span>
                  @if ( $key !== 'phone' )
                  {!! $detail !!}
                  @else
                  <a href="tel:<?= preg_replace('/[^0-9]/', '', $detail); ?>"><?= $detail; ?></a>
                  @endif
                </span>
              </li>
              @endif

              @php } @endphp
            </ul>
            @endif

            {!! the_content() !!}
          </div>
        </div>
      </div>
