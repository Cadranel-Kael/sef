@extends('layouts.app', [
  'title' => 'Nos Magasins',
  ])

@section('content')
  <div class="shops">
    <div
      style="background-image:
      linear-gradient(
          rgba(0, 0, 0, 0.7),
          rgba(0, 0, 0, 0.7)
        ),
        url('{{ wp_get_attachment_image_url($background, 'large') }}')" class="shops__header">
      <span aria-hidden="true" class="shops__title">Nos <strong>Magasins</strong></span>
      <p class="shops__description">
        Nous avons plusieurs magasins partenaire qui finance notre cause. Ceci est un moyen de nous soutenire.
      </p>
    </div>
    <div class="shops__container">
      @if($shops->isEmpty())
        Il y a pas de magasins à afficher.
      @endif
      @foreach($shops as $shop)
        <article class="shops__card card">
          {!! wp_get_attachment_image($shop->image, 'medium', false, ['class' => 'card__image']) !!}
          <h2 class="card__title">{{ $shop->title }}</h2>
          <p class="card__type">{{ $shop->type }}</p>
          <p class="card__address">{{ $shop->location }}</p>
          <a class="card__link" href="{{ $shop->link }}">Vers la page {{ $shop->title }}</a>
        </article>
      @endforeach
    </div>
    {{!! kc_pagination($pages = '', $range = 2)}}
  </div>
@endsection
