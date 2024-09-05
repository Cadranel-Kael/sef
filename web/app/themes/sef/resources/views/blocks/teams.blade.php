<section class="teams">
  <h2 class="teams__title">{!! $heading !!}</h2>
  @while($teams->have_posts())
    @php($teams->the_post())
    @php($members = get_field('member', get_the_ID()))
    <section class="teams__team team">
      <h3 class="team__title">{!! get_the_title() !!}</h3>
      @if($members)
        <ul class="team__members">
          @foreach($members as $member)
            <li class="team__member member">
              {!! wp_get_attachment_image($member['image'], 'thumbnail', false, ['class' => 'member__image']) !!}
              <div class="member__name">{{ $member['full_name'] }}</div>
            </li>
          @endforeach
        </ul>
      @else
        <div>{{ __('Il y a aucun membre dans cette equipe') }}</div>
      @endif
    </section>
  @endwhile

  <div class="teams__container">
    <div class="team__join">{{ $join_us }}</div>
    <x-button type="primary">Nous contacter</x-button>
    <x-button type="primary">Devenir bénévole</x-button>
  </div>
</section>
