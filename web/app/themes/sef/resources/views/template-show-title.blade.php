{{--
  Template Name: Montrer le titre
--}}

@extends('layouts.app')

@section('content')

  @if (! have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif

  @while(have_posts()) @php(the_post())
  <span aria-hidden="true" class="app__title">{{ get_the_title() }}</span>
  @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
  @endwhile

  {!! get_the_posts_navigation() !!}
@endsection