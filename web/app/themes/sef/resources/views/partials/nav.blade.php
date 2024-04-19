<nav class="nav">
  <h2 class="nav__title sr-only">{{__('Menu principale')}}</h2>
  <li>
    <a class="nav__home" href="{{ home_url('/') }}">
      {!! wp_get_attachment_image($siteLogo, 'thumbnail', false, ['class' => 'nav__logo']) !!}
    </a>
  </li>
  @if (has_nav_menu('primary_navigation'))
    <x-burger-button id="burger-button"/>
    <ul class="nav__menu" id="main-menu">
      @foreach(get_navigation_links('primary_navigation') as $link)
        <li>
          <a href="{{ $link->url }}" class="nav__link">{{ $link->label }}</a>
        </li>
      @endforeach
      @if($cta)
        <li>
          <x-button class="nav__button" type="primary" :href="$cta['url']">{{ $cta['title'] }}</x-button>
        </li>
      @endif
      <li class="nav__search-item">
        <x-search class="nav__search"/>
      </li>
    </ul>
  @endif


</nav>
