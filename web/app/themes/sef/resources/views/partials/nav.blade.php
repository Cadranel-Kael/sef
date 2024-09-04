<nav class="nav">
  <h2 class="nav__title sr-only">{{__('Menu principale')}}</h2>
  <a class="nav__home" href="{{ home_url('/') }}">
    {!! wp_get_attachment_image($siteLogo, [1, 1], false, ['class' => 'nav__logo style-svg']) !!}
  </a>
  <x-burger-button id="burger-button"/>
  @if (has_nav_menu('primary_navigation'))
    <ul class="nav__menu menu" id="main-menu">
      <li class="menu__item menu__item--logo">
        <a class="menu__link" aria-hidden="true" href="{{ home_url('/') }}">
          {!! wp_get_attachment_image($siteLogo, 'thumbnail', false, ['class' => 'menu__logo style-svg']) !!}
        </a>
      </li>
      @foreach(get_navigation_links('primary_navigation') as $link)
        <li class="menu__item">
          <a href="{{ $link->url }}" class="menu__link @if($link->active) menu__link--active @endif">{{ $link->label }}</a>
        </li>
      @endforeach
      @if($cta)
        <li class="menu__item menu__item--button">
          <x-button class="menu__button" type="primary" :href="$cta['url']">{{ $cta['title'] }}</x-button>
        </li>
      @endif
    </ul>
  @endif


</nav>
