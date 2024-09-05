import {LoadingScreen} from "./LoadingScreen";

export class Animation {
  protected element: HTMLElement;
  protected onAppear: boolean;
  protected onAppearClassName: string = 'on-appear';
  protected loadingScreen: LoadingScreen | undefined;

  constructor(element: HTMLElement, onAppear: boolean = false, loadingScreen?: LoadingScreen) {
    this.element = element;
    this.onAppear = onAppear;
    this.loadingScreen = loadingScreen;

    this.initAnimation();
  }

  private initAnimation() {
    if (this.onAppear) {
      this.Appear();
    } else {
      this.start();
    }
  }

  Appear() {
    window.addEventListener('load', this.onLoad);
    window.addEventListener('scroll', this.onScroll);
  }

  private show() {
    this.onTransitionEnd();
    this.element.classList.add(`${this.onAppearClassName}--visible`);
    this.start();
  }

  onLoad = () => {
    this.element.classList.add(`${this.onAppearClassName}--hidden`);
    if (this.isElementInViewport(this.element)) {
      if (this.loadingScreen) {
        this.loadingScreen.waitForLoading().then(() => {
          this.show();
          return;
        });
      }
      this.show();
    }
  }

  onScroll = () => {
    if (this.isElementInViewport(this.element) && !this.element.classList.contains(`${this.onAppearClassName}--visible`)) {
      if (this.loadingScreen) {
        this.loadingScreen.waitForLoading().then(() => {
          this.show();
          return;
        });
      }
      this.show();
    }
  }

  private onTransitionEnd = () => {
    this.element.classList.remove(`${this.onAppearClassName}--hidden`);
  }

  private isElementInViewport(element: Element) {
    const rect = element.getBoundingClientRect();
    return (
      rect.top >= -0.6 &&
      rect.left >= -0.6 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) + 0.6 &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth) + 0.6
    );
  }

  public start() {
    this.animate();
  }

  public animate() {
  }
}
