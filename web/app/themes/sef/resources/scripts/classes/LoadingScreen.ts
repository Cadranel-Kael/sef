export class LoadingScreen {

  private loadingScreen: HTMLElement;
  private text: string;
  private loadingComplete: Promise<void>;
  private static instance: LoadingScreen | null = null;

  constructor(text: string) {
    this.text = text;

    if (document.readyState === 'complete' || document.readyState === 'interactive') {
      console.log('LoadingScreen: Document already loaded')
      this.loadingComplete = Promise.resolve();
    } else {
      this.createLoadingScreen();
      this.loadingComplete = this.addEventListener();
    }
  }

  createLoadingScreen() {
    this.loadingScreen = document.createElement('div');
    this.loadingScreen.classList.add('loading-screen');
    this.loadingScreen.textContent = this.text;
    document.body.appendChild(this.loadingScreen);
  }

  addEventListener(): Promise<void> {
    return new Promise((resolve) => {
      window.addEventListener('load', () => {
        this.loadingScreen.classList.add('loading-screen--hidden');
        this.loadingScreen.addEventListener('transitionend', () => {
          this.loadingScreen.remove();
          resolve();  // Resolve the promise when the loading screen is removed
        });
      });
    });
  }

  public waitForLoading(): Promise<void> {
    return this.loadingComplete;
  }
}
