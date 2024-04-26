<footer class="footer">
  <nav>
    <h2 class="sr-only">{{__('Menu footer')}}</h2>
    <a class="footer__home" href="{{ home_url('/') }}">
      {!! wp_get_attachment_image($siteLogo, 'thumbnail', false, ['class' => 'footer__logo style-svg']) !!}
    </a>
    @if (has_nav_menu('footer_navigation'))
      <ul class="footer__menu" id="footer-menu">
        @foreach(get_navigation_links('footer_navigation') as $link)
          <li>
            <a href="{{ $link->url }}" class="footer__link @if($link->active) footer__link--active @endif">{{ $link->label }}</a>
          </li>
        @endforeach
      </ul>
    @endif
  </nav>
  <div class="footer__info">
    <p class="footer__text">{{ $phone }}</p>
    <p class="footer__text">{{ $email }}</p>
    <p class="footer__text">{{ $address }}</p>
  </div>
  <x-button>Nous soutenir</x-button>
</footer>
