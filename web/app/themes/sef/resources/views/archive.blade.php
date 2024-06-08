I@extends('layouts.app', ['title' => $title])

@section('content')
  @include('partials.archives.archive-' . get_queried_object()->name)
@endsection
