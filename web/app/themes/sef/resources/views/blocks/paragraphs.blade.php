<div class="paragraphs {{$background_decoration ? 'paragraphs--decoration' : ''}}">
  @if($blocks->isEmpty())
    <article class="paragraphs__block">
      <div class="paragraphs__text">
        <h2 class="paragraphs__title">{!! $blocks->title !!}</h2>
        <p class="paragraphs__paragraph">{!! $example['text'] !!}</p>
      </div>
    </article>
  @endif
  @foreach($blocks as $block)
    <article class="paragraphs__block">
      @if($block->image_field)
        {!! wp_get_attachment_image($block->image, 'medium', false, ['class' => 'paragraphs__image paragraphs__image--' . $block->lenght]) !!}
      @endif
      <div class="paragraphs__text">
        <h2 class="paragraphs__title">{!! $block->heading !!}</h2>
        <p class="paragraphs__paragraph">{!! $block->text !!}</p>
      </div>
    </article>
  @endforeach
</div>

