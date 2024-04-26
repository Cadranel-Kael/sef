export class SlideSide {
  private _button: HTMLButtonElement;
  private _element: HTMLElement;

  constructor(element: any) {
    this._element = element as HTMLElement;
    this._element.classList.add('slide-side--closed');
    this.init();
  }

  init() {
    this._button = document.createElement('button');
    this._button.classList.add('slide-side__button');
    this._element.appendChild(this._button);
    this.initEvents();
  }

  initEvents() {
    this._button.addEventListener('click', this.toggle.bind(this));
  }

  toggle() {
    this._element.classList.toggle('slide-side--closed');
  }
}
