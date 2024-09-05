@extends('layouts.app', [
  'title' => get_the_title(),
  ])
@section('content')
  <div class="news-article">
    <div class="news-article__container">
      <span class="news-article__title">{!! get_the_title() !!}</span>
      <span class="news-article__date">{{ $date }}</span>
      @if($articles)
        @foreach($articles as $article)
          <div class="news-article__paragraph paragraph">
            <h2 class="paragraph__title">{!! $article->title !!}</h2>
            <div class="paragraph__container">
              @if($article->text)
                {!! $article->text !!}
              @else
                Il n’y a pas de contenu à afficher.
              @endif
            </div>
          </div>
        @endforeach
      @endif
    </div>
    <div class="news-article__latest latest">
      <h2 class="latest__title"><strong>Derniers</strong> articles</h2>
      <div class="latest__container">
        @if($latest->isEmpty())
          Il y a pas d’articles à afficher.
        @endif
        @foreach($latest as $article)
          <x-article-card
            :thumbnail="$article->thumbnail"
            :title="$article->title"
            :type="$article->type"
            :date="$article->date"
            :link="$article->link"/>
        @endforeach
      </div>
    </div>
  </div>
@endsection
