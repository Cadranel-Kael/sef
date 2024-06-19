<div class="{{ $block->classes }} block-list" style="{{ $block->inlineStyle }}">
  <h2 class="block-list__title">{!! $title !!}</h2>
  <ul class="block-list__list">
    @foreach($items as $item)
      <li class="block-list__item">{{ $item }}</li>
    @endforeach
  </ul>
</div>
