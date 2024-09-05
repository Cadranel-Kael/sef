<div class="block-latest">
  <div class="block-latest__title on-appear"><strong>Dernières</strong> Actualités</div>
  <div class="block-latest__container on-appear">
    @if($posts->isEmpty())
      Il y a pas d’articles à afficher.
    @endif
    @foreach($posts as $post)
      <x-article-card
        :thumbnail="$post->thumbnail"
        :title="$post->title"
        :type="$post->type"
        :date="$post->date"
        :link="$post->link"/>
    @endforeach
  </div>
  <x-button class="block-latest__link" href="{{ $link }}" type="primary">Voir toutes les actualités</x-button>
</div>
