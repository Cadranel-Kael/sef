<div class="{{ $block->classes }} block-feature" style="{{ $block->inlineStyle }}">
  <h2 class="block-feature__title">{!! $heading !!}</h2>
  <ul class="block-feature__list">
    @foreach($items as $item)
      <li class="block-feature__item item">
        <h3 class="item__title">{{ $item->heading }}</h3>
        <p class="item__paragraph">{{ $item->paragraph }}</p>
      </li>
    @endforeach
  </ul>
</div>
