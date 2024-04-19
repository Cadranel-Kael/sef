export class BurgerMenu {
  private _button: HTMLButtonElement;
  private _menu: HTMLUListElement;
  private _open: boolean;

  constructor(menu: HTMLUListElement, button: HTMLButtonElement) {
    this._menu = menu;
    this._button = button
    this.init();
  }

  init() {
    this.initEvents();
    this._menu.classList.add('nav__menu--closed');
  }

  initEvents() {
    this._button.addEventListener('click', this.toggle.bind(this));
  }

  toggle() {
    if (this._open) {
      this._menu.classList.remove('nav__menu--open')
      this._menu.classList.add('nav__menu--closed');
      this._button.classList.remove('burger-button--open');
      this._open = false;
    } else {
      this._menu.classList.remove('nav__menu--closed')
      this._menu.classList.add('nav__menu--open');
      this._button.classList.add('burger-button--open');
      this._open = true;
    }
  }
}
