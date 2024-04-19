import domReady from '@roots/sage/client/dom-ready';
import {Search} from "./classes/Search";
import {BurgerMenu} from "./classes/BurgerMenu";
import {SlideSide} from "./classes/SlideSide";

/**
 * Application entrypoint
 */
domReady(async () => {
  const search = document.querySelector('.search') as HTMLElement;
  new Search(search, search.querySelector('#form'), search.querySelector('#search') as HTMLInputElement, search.querySelector('#button') as HTMLButtonElement);
  new BurgerMenu(document.querySelector('#main-menu') as HTMLUListElement, document.querySelector('#burger-button') as HTMLButtonElement);
  document.querySelectorAll('[x-slide]').forEach((element) => new SlideSide(element));
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
// @ts-ignore
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);

