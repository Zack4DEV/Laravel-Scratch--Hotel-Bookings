export * from './clipboard';
export * from './getBrowserInfo';
export * from './scroll';

export function stopPropagation(event: Event) {
  event.stopPropagation();
}

export function preventDefault(event: Event, isStopPropagation?: boolean) {
  /* istanbul ignore else */
  if (typeof event.cancelable !== 'boolean' || event.cancelable) {
    event.preventDefault();
  }

  if (isStopPropagation) {
    stopPropagation(event);
  }
}
/**
  * Insert `style` tag
  */
export function appendStyle(css: string, id: string, replace = true) {
  let style = document.getElementById(id);
  if (style && replace) {
    document.head.removeChild(style);
    style = null;
  }

  if (!style) {
    const el = document.createElement('style');
    el.type = 'text/css';
    el.id = id;
    el.textContent = css;

    document.head.appendChild(el);
  }
}

/**
  * Dynamically load styles
  * @description Load css file
  * @param path external resource url address
  * @param props attributes supported by the `link` tag
  */
export function loadCss(path: string, props = {}): Promise<any> {
  return new Promise((resolve, reject) => {
    const css = document.querySelector(`link[href="${path}"]`);

    if (!css) {
      const newCss = document.createElement('link');

      newCss.rel = 'stylesheet';
      newCss.href = path;

      Object.keys(props).forEach((key) => {
        newCss[key] = props[key];
      });

      document.head.appendChild(newCss);

      newCss.onload = resolve;
      newCss.onerror = reject;
    }
  });
}

/**
  *Dynamic loading script
  * @description Load js file
  * @param path external resource url address
  * @param props attributes supported by the `script` tag
  */
export function loadScript(path: string, props = {}): Promise<any> {
  return new Promise((resolve, reject) => {
    const script = document.querySelector(`script[src="${path}"]`);

    if (!script) {
      const newScript = document.createElement('script');
      newScript.type = 'text/javascript';
      newScript.src = path;

      Object.keys(props).forEach((key) => {
        newScript[key] = props[key];
      });

      document.body.appendChild(newScript);

      newScript.onload = resolve;
      newScript.onerror = reject;
    }
  });
}
