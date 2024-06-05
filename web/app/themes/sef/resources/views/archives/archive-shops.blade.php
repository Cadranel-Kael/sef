<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>Shops</h1>
      <ul>
        @foreach($shops as $shop)
          <li>
            <a href="{{ get_permalink($shop->ID) }}">{{ $shop->post_title }}</a>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
