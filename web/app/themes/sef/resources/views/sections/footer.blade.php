<footer class="app__footer footer">
  <div class="footer__inner">
    <nav class="footer__nav">
      <h2 class="sr-only">{{__('Menu footer')}}</h2>
      <a class="footer__home" title="Vers la page d'acceuil" href="{{ home_url('/') }}">
        {!! wp_get_attachment_image($siteLogo, ['300', '300'], false, ['class' => 'footer__logo style-svg', 'itemprop' => 'logo']) !!}
      </a>
      @if (has_nav_menu('footer_navigation'))
        <ul class="footer__menu" id="footer-menu">
          @foreach(get_navigation_links('footer_navigation') as $link)
            <li class="footer__menu-item">
              <a href="{{ $link->url }}" class="footer__link @if($link->active) footer__link--active @endif">
                <span>{{ $link->label }}</span>
              </a>
            </li>
          @endforeach
        </ul>
      @endif
    </nav>
    <div class="footer__info" itemscope itemtype="http://schema.org/Organization">
      <a class="footer__phone" title="Nous appeler" href="{{ $phone }}" class="footer__text" itemprop="telephone">{{ $phone }}</a>
      <a href="mailto:{{ $email }}" title="Nous contacter par e-mail" class="footer__text" itemprop="email">{{ $email }}</a>
      <a href="https://www.google.com/maps?q={{ $addressForMaps }}" target="_blank" class="footer__text" itemprop="address">{{ $address }}</a>
    </div>
    <x-button>Nous soutenir</x-button>
  </div>
</footer>
