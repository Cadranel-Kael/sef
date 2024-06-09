<div class="shops">
  <div class="shops__title">Nos <strong>Magasins</strong></div>
  <p class="shops__description">Nous avons plusieurs magasins partenaire qui finance notre cause. Ceci est un moyen de nous soutenire.</p>
  <div class="shops__container">
      @foreach($shops as $shop)
        <article class="shops__card card">
          {!! wp_get_attachment_image($shop->image, 'medium', false, ['class' => 'shop__image']) !!}
          <h2 class="card__title">{{ $shop->title }}</h2>
          <p class="card__type">{{ $shop->type }}</p>
          <p class="card__address">{{ $shop->location }}</p>
          <a class="card__link" href="{{ $shop->link }}">Vers la page {{ $shop->title }}</a>
        </article>
      @endforeach
  </div>
</div>
