<div class="{{ $block->classes }} heading" style="{{ $block->inlineStyle }}">
    @if ($heading)
        {{ $heading }}
    @else
        <h2 class="block-title">Votre titre ici</h2>
    @endif
</div>
