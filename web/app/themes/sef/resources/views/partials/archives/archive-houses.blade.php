@extends('layouts.app', [
  'title' => 'Nos hébergements',
  ])

@section('content')
  <div class="houses">
    <div class="houses__title on-appear">Nos <strong>hébergements</strong></div>
    <div class="houses__container">
      @if($houses->isEmpty())
        Il y a pas d’hébergements à afficher.
      @endif
      @foreach($houses as $house)
        <article class="houses__house house on-appear">
          {!! wp_get_attachment_image($house->image, 'medium', false, ['class' => 'house__image']) !!}
          <div class="house__container">
            <h2 class="house__title">{{ $house->title }}</h2>
            <ul class="house__attributes">
              <li class="house__places">{{ $house->places }} personnes par ans</li>
              <li class="house__beds">{{ $house->beds }} lits en hébergements d’urgence</li>
              <li class="house__address">{{ $house->address }}</li>
            </ul>
          </div>
        </article>
      @endforeach
      {{!! kc_pagination($pages = '', $range = 2)}}
    </div>
  </div>
@endsection
