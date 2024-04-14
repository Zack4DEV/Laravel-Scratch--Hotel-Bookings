/**
 * function throttling
 * @param {callback} fn event callback
 * @param {number} interval time interval threshold
 */
export function throttle(fn: any, interval: number) {
  let last = 0;
  return function () {
    // @ts-ignore
    // eslint-disable-next-line
    const context = this;
    const args = arguments;
    const now = Number(new Date());

    if (now - last >= interval) {
      last = now;
      fn.apply(context, args);
    }
  };
}

/**
 * function debounce
 * @param {callback} fn event callback
 * @param {number} delay The waiting time for each postponed execution
 */
export function debounce(fn: any, delay: number) {
  let last = 0;
  let timer: any = null;
  return function () {
    // @ts-ignore
    // eslint-disable-next-line
    const context = this;
    const args = arguments;
    const now = Number(new Date());

    if (now - last < delay) {
      clearTimeout(timer);
      timer = setTimeout(() => {
        last = now;
        fn.apply(context, args);
      }, delay);
    } else {
      last = now;
      fn.apply(context, args);
    }
  };
}

/**
  * deep copy
  * @param {*} source source object
  * @returns the new object after copying
  */
export function deepClone<T = any>(source: {}): T {
  const target: any = Array.isArray(source) ? [] : {};
  // eslint-disable-next-line guard-for-in
  for (const key in source) {
    target[key] = source[key] !== null && typeof source[key] === 'object' ? deepClone(source[key]) : source[key];
  }

  return target;
}

/**
  * Generate random integers within the specified two integer ranges
  * @param {number} m
  * @param {number} n
  * @example
  * ```js
  * random(0, 10) // 1
  * ```
  */
export const randomIntegerInRange = function (m: number, n: number) {
  return m + Math.floor(Math.random() * (n - m));
};

/**
  * Convert camel case string to a specific format
  * @description Use String.replace() to remove underscores, hyphens, and spaces, and convert camelCase words to all lowercase. Omitting the second parameter separator, the _ separator is used by default.
  */
export function fromCamelCase(str: string, separator = '_') {
  return str
    .replace(/([a-z\d])([A-Z])/g, '$1' + separator + '$2')
    .replace(/([A-Z]+)([A-Z][a-z\d]+)/g, '$1' + separator + '$2')
    .toLowerCase();
}

/**
  * Map the attribute values in the source object with the same attribute name as the target object to the target object
  */
export function mapMatchingProperties(target: {}, source: {}) {
  Object.keys(target).forEach((key) => {
    if (key in source) {
      target[key] = source[key];
    }
  });

  return target;
}
