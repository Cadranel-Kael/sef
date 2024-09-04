<section
  style="{{ $block->inlineStyle }}; background-image: url({{ wp_get_attachment_image_url($background, 'full') }});"
  class="hero hero--{{ $alignment }} {{ $block->classes }}">
  <div class="hero__container on-appear">
    {!! $heading !!}
    @if($text)
      <p class="hero__text">{!! $text !!}</p>
    @endif
  </div>
  <figure class="hero__figure">
    <img class="hero__stroke" src="@asset('images/visual-strokes.svg')" alt="">
    {!! wp_get_attachment_image($image, 'large', false, ['class' => 'hero__image']) !!}
  </figure>
</section>
