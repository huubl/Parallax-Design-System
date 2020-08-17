@php
$video_group = get_field('hero_video');
@endphp

<div class="section active w-full" role="region" aria-label="Hero">
  <div class="section-brm--hero container hero--video has-video relative flex justify-center items-center">
    <video class="hero__video" preload="auto" data-autoplay loop muted playsinline>
      <source src="{!! $video_group['hero_mp4'] !!}" type="video/mp4"/>
      <source src="{{ $video_group['hero_webm'] }}" type="video/webm"/>
    </video>
    @php
    $hero_message = get_field('hero_content');
    $content_width = get_field('content_width');
    $content_position = get_field('content_position');
    $max_height = get_field('hero_height');

    //Animation

    $hero_animation = get_field('hero_animation');
    @endphp
    <div class="hero_content mx-auto block w-3/4 md:{!! $content_width !!} {!! $content_position !!} block mx-auto"
    style="min-height: {!! $max_height !!}px;">
    <div class="hero_content--container bg-white @if(! is_admin()) {!! $hero_animation !!} @endif ">
      {!! $options['content'] !!}

    </div>
  </div>

</div>
</div>
