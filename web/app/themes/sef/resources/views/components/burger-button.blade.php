<button {{ $attributes->merge(['class' => 'burger-button ', 'aria-expanded' => 'true' ]) }}>
  <span class="burger-button__text sr-only">Open Menu</span>
  <svg class="burger-button__burger" viewBox="0 0 100 100" width="24">
    <rect class="burger-button__line burger-button__line--top" x="10" y="20" width="80" height="10"></rect>
    <rect class="burger-button__line burger-button__line--middle" x="10" y="45" width="80" height="10"></rect>
    <rect class="burger-button__line burger-button__line--bottom" x="10" y="70" width="80" height="10"></rect>
  </svg>
</button>
