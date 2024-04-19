<!doctype html>
<html @php(language_attributes())>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php(do_action('get_header'))
    @php(wp_head())
  </head>

  <body @php(body_class())>
    @php(wp_body_open())

    <div class="app" id="app">
      <a class="sr-only focus:not-sr-only" href="#main">
        {{ __('Skip to content') }}
      </a>
      <h1 class="sr-only">{{ get_the_title() }}</h1>

      @include('sections.header')

      <div class="app_fixed-cta fixed-cta" data-align="right" x-slide>
        <x-button type="primary" class="fixed-cta__button" :href="$btn1['url']">{{ $btn1['title'] }}</x-button>
        <x-button type="outline" class="fixed-cta__button" :href="$btn2['url']">{{ $btn2['title'] }}</x-button>
      </div>

      <main id="main" class="main">
        @yield('content')
      </main>

      @hasSection('sidebar')
        <aside class="sidebar">
          @yield('sidebar')
        </aside>
      @endif

      @include('sections.footer')
    </div>

    @php(do_action('get_footer'))
    @php(wp_footer())
  </body>
</html>
