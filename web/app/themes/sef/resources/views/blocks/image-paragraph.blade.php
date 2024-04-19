<section style="{{ $block->inlineStyle }}" class="image-paragraph image-paragraph--{{ $alignment }} {{ $block->classes }}">
  <div class="image-paragraph__container">
    <h2 class="image-paragraph__title">{!! $heading !!}</h2>
    <p>{!! $paragraph !!}</p>
  </div>
  {!! wp_get_attachment_image($image, 'large', false, ['class' => 'image-paragraph__image']) !!}
</section>
