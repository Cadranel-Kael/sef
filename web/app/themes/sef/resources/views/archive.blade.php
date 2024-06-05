@extends('layouts.app', ['title' => get_post_type_object(get_post_type())->label])

@section('content')
  @includeFirst(['archives.archive-' . get_post_type(), 'partials.content-single'])
@endsection
