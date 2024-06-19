@extends('layouts.app')

@section('content')

  @if (! have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif

  @while(have_posts())
    @php(the_post())
    <div
      style="background-image:
      linear-gradient(
          rgba(0, 0, 0, 0.7),
          rgba(0, 0, 0, 0.7)
        ),
        url('{{ wp_get_attachment_image_url($background, 'large') }}')" class="app-header">
      <span aria-hidden="true" class="app-header__title">{!! $heading !!}</span>
    </div>
    @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
  @endwhile

  {!! get_the_posts_navigation() !!}
@endsection
