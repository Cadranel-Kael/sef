<section style="{{ $block->inlineStyle }}" class="hero hero--{{ $alignment }} {{ $block->classes }}">
  <div class="hero__container">
    {!! $heading !!}
    @if($text)
      <p class="hero__text">{!! $text !!}</p>
    @endif
  </div>
  <figure class="hero__figure">
    {!! wp_get_attachment_image($image, 'large', false, ['class' => 'hero__image']) !!}
  </figure>
</section>
