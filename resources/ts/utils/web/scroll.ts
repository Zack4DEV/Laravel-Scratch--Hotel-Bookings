export type ScrollElement = Element | Window;

export function getScrollTop(el: ScrollElement): number {
  const top = 'scrollTop' in el ? el.scrollTop : el.scrollY;

  // iOS scroll bounce cause minus scrollTop
  return Math.max(top, 0);
}

export function setScrollTop(el: ScrollElement, value: number) {
  if ('scrollTop' in el) {
    el.scrollTop = value;
  } else {
    el.scrollTo(el.scrollX, value);
  }
}

export function getRootScrollTop(): number {
  return window.scrollY || document.documentElement.scrollTop || document.body.scrollTop || 0;
}

export function setRootScrollTop(value: number) {
  setScrollTop(window, value);
  setScrollTop(document.body, value);
}

/**
  * Get the distance from the top of the element to the top of the page, plus the scroll distance
  */
export function getElementTop(el: ScrollElement, scroller?: ScrollElement) {
   if (el === window) {
     return 0;
   }

   const scrollTop = scroller ? getScrollTop(scroller) : getRootScrollTop();

   return (el as Element).getBoundingClientRect().top + scrollTop;
}