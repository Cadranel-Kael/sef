import domReady from '@roots/sage/client/dom-ready';
import {Search} from "./classes/Search";
import {BurgerMenu} from "./classes/BurgerMenu";
import {SlideSide} from "./classes/SlideSide";
import {NumberAnimator} from "./classes/NumberAnimator";
import {Animation} from "./classes/Animation";
import {settings} from "./settings";
import {LoadingScreen} from "./classes/LoadingScreen";

/**
 * Application entrypoint
 */
domReady(async () => {
  new BurgerMenu(document.querySelector('#main-menu') as HTMLUListElement, document.querySelector('#burger-button') as HTMLButtonElement);
  document.querySelectorAll('[x-slide]').forEach((element) => new SlideSide(element));
  document.querySelectorAll('.' + settings.animation.onAppear.className).forEach((element) => new Animation(element as HTMLElement, true));
  document.querySelectorAll('.number-animator').forEach((element) => {
    new NumberAnimator(element as HTMLElement, 1000, true);
  });
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
// @ts-ignore
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);

