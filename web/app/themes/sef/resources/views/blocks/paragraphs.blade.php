<div class="paragraphs">
  @while( have_rows('blocks') )
    @php(the_row())
    <article class="paragraphs__block">
    @if(get_sub_field('image_field'))
      {!! wp_get_attachment_image(get_sub_field('image'), 'medium', false, ['class' => 'paragraphs__image']) !!}
    @endif
      <div class="paragraphs__text">
        <h2 class="paragraphs__title">{!! get_sub_field('heading') !!}</h2>
        <p class="paragraphs__paragraph">{!! get_sub_field('text', false, false) !!}</p>
      </div>
    </article>
  @endwhile
</div>

