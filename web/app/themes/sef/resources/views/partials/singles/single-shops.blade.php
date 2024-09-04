@extends('layouts.app', [
  'title' => $shopTitle,
  ])
@section('content')
  {!! wp_get_attachment_image($background, 'large', false, ['class' => 'app__top-image']) !!}
  <div class="shop">
    <div class="shop__title"><strong>{{ $shopTitle }}</strong></div>
    <div class="shop__type">{{ $type }}</div>
    <div class="shop__container container">
      <div class="shop__contact">
        <a href="https://www.google.com/maps?q={{ $locationForMaps }}" target="_blank" class="shop__address shop__info">{{ $address }}</a>
        @if($shopPhone)
          <a title="Appeler le magasin" href="tel:$shopPhone" class="shop__phone shop__info">{{ $shopPhone }}</a>
        @endif
        @if($shopWebsite)
          <a href="{{ $shopWebsite }}" target="_blank" class="shop__website shop__info">{{ $shopWebsite }}</a>
        @endif
        @if($shopEmail)
          <a href="mailto:{{ $shopEmail }}" title="Envoyer un mail" class="shop__email shop__info">{{ $shopEmail }}</a>
        @endif
      </div>
      <div class="shop__schedule schedule">
        <table class="schedule__table">
          <thead>
          <tr>
            <th class="schedule__title" colspan="2">Heurs d’ouverture</th>
          </tr>
          </thead>
          <tbody class="schedule__body">
          @foreach($days as $day)
            <tr class="schedule__row">
              <th class="schedule__days">{{ $day->name }}</th>
              <td class="schedule__hours">{{ $day->hours }}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
    {!! wp_get_attachment_image($image, 'medium', false, ['class'=>'shop__image']) !!}
  </div>
@endsection
