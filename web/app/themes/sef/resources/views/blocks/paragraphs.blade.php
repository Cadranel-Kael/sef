<div class="paragraphs">
  @while( have_rows('blocks') )
    @php(the_row())
    <article class="paragraphs__block">
      <h2 class="paragraphs__title">{!! get_sub_field('heading') !!}</h2>
      <p class="paragraphs__text">{!! get_sub_field('text', false, false) !!}</p>
    </article>
  @endwhile
</div>

