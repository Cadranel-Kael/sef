<div class="{{ $block->classes }} block-donation-types" style="{{ $block->inlineStyle }}">
  <h2 class="block-donation-types__title on-appear">{!! $heading !!}</h2>
  <ul class="block-donation-types__list on-appear">
    @foreach($items as $key => $item)
      <li class="block-donation-types__item item" style="background-image: url({{ $item->background }}); animation-delay: {{ $key }}s">
            <h3 class="item__title">{{ $item->heading }}</h3>
            <a class="item__link" href="@if($item->link) {{$item->link }} @else # @endif" title="Vers la page {{ $item->heading }}"></a>
            <p class="item__description">{!! $item->paragraph !!}</p>
      </li>
    @endforeach
  </ul>
</div>
