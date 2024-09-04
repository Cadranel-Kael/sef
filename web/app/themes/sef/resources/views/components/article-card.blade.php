<article class="article-card on-appear">
  {!! wp_get_attachment_image($thumbnail, 'medium', false, ['class' => 'article-card__image']) !!}
  <div class="article-card__container">
    <h2 class="article-card__title">{{ $title }}</h2>
    <p class="article-card__type">{{ $type }}</p>
    <p class="article-card__date">{{ $date }}</p>
    <a class="article-card__link" href="{{ $link }}">Vers {{ $title }}</a>
  </div>
</article>
