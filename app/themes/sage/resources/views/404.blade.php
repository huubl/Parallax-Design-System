@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert-warning w-full">
      <div class="container">
        {!! apply_filters('the_content', __('Sorry, but the page you were trying to view does not exist. <a href="/home/">Click here</a> to return home.')) !!}
        <a href="{!! get_permalink(2) !!}" class="button button--primary">Return Home</a>
      </div>
    </div>
  @endif
@endsection
