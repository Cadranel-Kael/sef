import Axios from "axios";

export class Search {
  private _root: HTMLElement;
  private _form: HTMLFormElement;
  private _input: HTMLInputElement;
  private _button: HTMLButtonElement;
  private _expaned: boolean = false;
  private _loading: boolean = false;
  private _dropdown: HTMLDivElement;
  private _results: HTMLUListElement;
  private _url: string;
  private _open: boolean = false;

  constructor(root: HTMLElement, form: HTMLFormElement, input: HTMLInputElement, button: HTMLButtonElement) {
    this._root = root;
    this._form = form;
    this._input = input;
    this._button = button;
    this._url = this._form.getAttribute('action');
    this._dropdown = this.createDropdown();
    this._results = this.createResults();
    this.init();
  }

  initEvents() {
    this._form.addEventListener('focusin', this.expand.bind(this));
    this._form.addEventListener('focusout', this.collapse.bind(this));
    this._form.addEventListener('submit', this.submit.bind(this));
    this._input.addEventListener('keyup', this.submit.bind(this));
  }

  init() {
    this._button.type = 'button';
    this.collapse();
    if (this._input.value) this.expand();
    this.initEvents();
  }

  submit(e: Event) {
    e.preventDefault();

    let value = this._input.value;

    if (!value) return;

    this.setLoading();

    Axios.get(this._url + '?' + this._input.name + '=' + value)
      .then((response) => {
        this.unsetLoading();
        this.showResults(response.data);
      });
  }

  expand() {
    this._expaned = true;
    this._input.classList.toggle('search__input--expanded', this._expaned);
  }

  collapse() {
    if (this._input.value) return;
    this._expaned = false;
    this._input.classList.toggle('search__input--expanded', this._expaned);
  }

  createDropdown() {
    let dropdown = document.createElement('div');
    dropdown.classList.add('search__dropdown');
    this._form.appendChild(dropdown);

    return dropdown;
  }

  createResults() {
    let results = document.createElement('ul');
    results.classList.add('search__results');

    this._dropdown.appendChild(results);

    return results;
  }

  setLoading() {
    if (this._loading) return;
    this._loading = true;
    this._dropdown.classList.add('search__dropdown--loading');
  }

  unsetLoading() {
    if (!this._loading) return;
    this._loading = false;
    this._dropdown.classList.remove('search__dropdown--loading');
  }

  private showResults(data: any) {
    let root = document.createElement('div');
    root.innerHTML = data;

    this._results.innerHTML = '';

    let results = root.querySelectorAll('.search__results');

    if (results.length) {
      return this.hideDropdown();
    }

    for (let i = 0; i < results.length; i++) {
      this._results.appendChild(results[i]);
    }

    this.showDropdown();
  }

  private showDropdown() {
      if (this._open) return;

      this._dropdown.classList.add('search__dropdown--show');
      this._open = true;
  }

  private hideDropdown() {
      if (!this._open) return;

      this._dropdown.classList.remove('search__dropdown--show');
      this._open = false;
  }
}
