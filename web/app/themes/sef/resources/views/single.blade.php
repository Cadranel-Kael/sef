@extends('layouts.app', ['title' => get_the_title()])

@section('content')
  @include('partials.singles.single-' . get_post_type())
@endsection
