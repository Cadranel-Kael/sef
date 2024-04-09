import domReady from '@roots/sage/client/dom-ready';
import {Search} from "./classes/Search";

/**
 * Application entrypoint
 */
domReady(async () => {
  const search = document.querySelector('.search') as HTMLElement;
  new Search(search, search.querySelector('#form'), search.querySelector('#search') as HTMLInputElement, search.querySelector('#button') as HTMLButtonElement);
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
// @ts-ignore
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);

