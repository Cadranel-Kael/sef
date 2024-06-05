<div class="houses">
  <h2 class="houses__title">Nos <strong>hébergements</strong></h2>
  <div class="houses__container">
    @foreach($houses as $house)
      <article class="houses__house house">
        {!! wp_get_attachment_image($house->image, 'medium', false, ['class' => 'house__image']) !!}
        <div class="house__container">
          <h3 class="house__title">{{ $house->title }}</h3>
          <ul class="house__attributes">
            <li class="house__places">{{ $house->places }} personnes par ans</li>
            <li class="house__beds">{{ $house->beds }} lits en hebergements d’urgence</li>
            <li class="house__address">{{ $house->address }}</li>
          </ul>
        </div>
      </article>
    @endforeach
  </div>
</div>
