@if ( is_singular(['capital-portfolio']) )

@include('partials/capital/singular')

@else

<div class="capital__protfolio--post">

  <div class="container">
    <article @php post_class() @endphp>
      <h1 class="entry-title">{!! get_the_title() !!}</h1>

      @include('partials/entry-meta')

      {!! the_content() !!}

    </article>
  </div>
</div>
@endif
