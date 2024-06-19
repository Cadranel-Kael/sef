@extends('layouts.app', [
  'title' => 'Nos hébergements',
  ])

@section('content')
  <div class="news">
    <div class="news__title"><strong>Actualités</strong></div>
    <div class="news__container">
      @if($news->isEmpty())
        Il y a pas d’actualités à afficher.
      @endif
      @foreach($news as $article)
        <x-article-card
          :thumbnail="$article->thumbnail"
          :title="$article->title"
          :type="$article->type"
          :date="$article->date"
          :link="$article->link"/>
      @endforeach
    </div>
    {{!! kc_pagination($pages = '', $range = 2)}}
  </div>
@endsection
