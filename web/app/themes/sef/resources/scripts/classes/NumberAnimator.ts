import {Animation} from './Animation';
import {LoadingScreen} from "./LoadingScreen";

export class NumberAnimator extends Animation {
  private targetNumber: number;
  private duration: number;
  private suffix: string = '';

  constructor(element: HTMLElement, duration: number, onAppear: boolean = false, loadingScreen?: LoadingScreen) {
    super(element, onAppear, loadingScreen);
    if (element.innerText.includes('%')) {
      this.suffix = '%';
      this.element.innerText = element.innerText.replace('%', '');
    }
    this.targetNumber = parseInt(element.innerText.replace(/\s/g, ''));
    this.element.innerText = '0';
    this.duration = duration;
  }

  animate() {
    const startTime = performance.now();
    const element = this.element;
    this.element.classList.remove(`${this.onAppearClassName}--hidden`);

    const updateNumber = (currentTime: number) => {
      const elapsed = currentTime - startTime;
      const progress = Math.min(elapsed / this.duration, 1); // Progress goes from 0 to 1
      const currentNumber = Math.floor(progress * this.targetNumber);
      element.textContent = currentNumber.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + this.suffix;

      if (progress < 1) {
        requestAnimationFrame(updateNumber);
      }
    };

    requestAnimationFrame(updateNumber);
  }

  start() {
    this.animate();
  }
}
