<div {{$attributes->merge(['class' => 'search'])}} >
  <form action="<?= home_url('/'); ?>" method="get" class="search__form" id="form">
    <div class="search__field">
      <label for="search" class="search__label sr-only">{{ __('Votre recherche') }}</label>
      <input type="search" name="s" id="search" placeholder="{{ __('Votre recherche') }}"
             value="<?= get_search_query(); ?>" class="search__input search__input--expanded"/>
      <button type="submit" class="search__button" id="button">
        <span class="sr-only">{{ __('Rechercher') }}</span>
      </button>
    </div>
  </form>
</div>
