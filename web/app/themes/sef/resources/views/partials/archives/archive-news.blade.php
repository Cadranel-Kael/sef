<div class="news">
  <div class="news__title"><strong>Actualités</strong></div>
  <div class="news__container">
    @if($news->isEmpty())
      Il y a pas d’actualités à afficher.
    @endif
    @foreach($news as $article)
      <article class="news__article article">
        {!! wp_get_attachment_image($article->thumbnail, 'medium', false, ['class' => 'article__image']) !!}
        <div class="article__container">
          <h2 class="article__title">{{ $article->title }}</h2>
          <p class="article__type">{{ $article->type }}</p>
          <p class="article__date">Il y a {{ $article->date }}</p>
          <a class="article__link" href="{{ $article->link }}">Vers {{ $article->title }}</a>
        </div>
      </article>
    @endforeach
  </div>
</div>
