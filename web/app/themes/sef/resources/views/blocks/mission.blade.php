<section class="{{ $block->classes }} block-mission block-mission--{{ $block->style }}" style="{{ $block->inlineStyle }}">
  <h2 class="block-mission__title on-appear">{!! $heading !!}</h2>
  <p class="block-mission__description on-appear">{!! $description !!}</p>
  <ul class="block-mission__list">
    @foreach($steps as $step)
      <li class="block-mission__item item on-appear">
        <h3 class="item__step">Étape {{ $loop->index + 1 }} <span class="sr-only">: {{ $step->heading }}</span></h3>
        <div class="item__content">
          <span aria-hidden="true" class="item__title">{{ $step->heading }}</span>
          <p class="item__description">{!! $step->description !!}</p>
        </div>
      </li>
    @endforeach
  </ul>
</section>
