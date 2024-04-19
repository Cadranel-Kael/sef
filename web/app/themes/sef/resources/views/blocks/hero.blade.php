<section style="{{ $block->inlineStyle }}" class="hero hero--{{ $alignment }} {{ $block->classes }}">
  <div class="hero__container">
    <h2 class="hero__title">{!! $heading !!}</h2>
    @if($text)
      <p class="hero__text">{!! $text !!}</p>
    @endif
  </div>
  {!! wp_get_attachment_image($image, 'large', false, ['class' => 'hero__image']) !!}
</section>
