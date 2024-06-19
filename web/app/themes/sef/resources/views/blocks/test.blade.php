<div
  class="{{ $block->classes }}"
  style="{{ $block->inlineStyle }}; background-image: url({{ $background }});"
>
    <InnerBlocks template="{{ $block->template }}" />
</div>
