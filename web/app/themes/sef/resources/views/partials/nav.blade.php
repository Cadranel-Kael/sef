<nav class="nav">
  <h2 class="nav__title sr-only">{{__('Menu principale')}}</h2>
  <a title="{{ __('vers l\'accueil') }}" href="{{ home_url('/') }}">
    {!! wp_get_attachment_image($siteLogo, 'thumbnail', false, ['class' => 'nav__logo']) !!}
  </a>
  @if (has_nav_menu('primary_navigation'))
    <ul class="nav__menu">
      @foreach(get_navigation_links('primary_navigation') as $link)
        <li>
          <a href="{{ $link->url }}" class="nav__link">{{ $link->label }}</a>
        </li>
      @endforeach
    </ul>
  @endif

  @if($cta)
    <x-button class="nav__button" type="primary" :href="$cta['url']">{{ $cta['title'] }}</x-button>
  @endif
  <x-search class="nav__search" />
</nav>
