export * from './file';
export * from './format';
export * from './goodStorage';
export * from './is';
export * from './lodash';
export * from './mobileConsole';
export * from './validate';
import { getBrowserInfo } from './web/getBrowserInfo';

const clientInfo = getBrowserInfo();

/**
  * Get a certain parameter of the link
  * @description Compatible with search and hash coexistence
  * @param {string} key parameter name
  * @param {string} [url] link
  * @returns {string} Return parameter value
  * @example
  * ```js
  * getQueryString('name'); // null
  * getQueryString('name', 'http://www.baidu.com?name=1&age=2'); // 1
  * ```
  */
export function getQueryString(key: string, url: string) {
  const reg = new RegExp(`([?&]+)${key}=([^&#]*)`);
  const href = url || window.location.href;
  const results = href.substring(1).match(reg);

  if (!results) return null;
  if (!results[2]) return '';

  return decodeURIComponent(results[2]);
}
/**
  * Get all parameters of the link
  * @description Compatible with search and hash coexistence
  * @param {string} [url] link
  * @returns {Record<string, string>} returns an object containing the current URL parameters
  * @example
  * ```js
  * getURLParameters();
  *
  * getURLParameters('http://www.baidu.com?name=1&age=2#/demoPage?weight=3&o=4');
  * // => {name: "1", age: "2", weight: "3", o: "4"}
  * ```
  */
export function getURLParameters(url: string): Record<string, string> {
  const reg = /([^?=&]+)(=([^&#]*))/g;
  const href = url || window.location.href;
  const matchList = href.match(reg) || [];
  const obj = {};

  matchList.forEach((v) => {
    obj[v.slice(0, v.indexOf('='))] = decodeURIComponent(v.slice(v.indexOf('=') + 1));
  });

  return obj;
}

/**
  * Print application information
  */
export function consoleAppInfo() {
  console.info('[app] onLaunch');
  console.info('[app] version:', __APP_INFO__.version);
  console.info('[app] URL:', window.location.href);
console.info(
     '[User information] Device information:',
     'Equipment type',
     getClientInfo().deviceType,
     'Whether Android',
     getClientInfo().isAndroid,
     'Is it iOS',
     getClientInfo().isIOS,
     'Whether to open it in WeChat',
     getClientInfo().isInWeChatApp,
     'Whether to open within the mini program',
     getClientInfo().isInMiniProgram,
   );
}

/**
  * Client information
  */
export function getClientInfo() {
  return clientInfo;
}

/**
 * rpx2px
 * @param {number} n
 * @param {number} [destWidth] 设计稿基准屏幕宽度
 */
export function rpx2px(n: number, destWidth = 375) {
  const ratio = document.documentElement.clientWidth / destWidth;

  return (n * ratio).toFixed(2);
}

/**
  * Dynamically expand the runtime environment
  */
export function getEnv() {
   let ENV = 'dev';
   if (/official domain name/.test(location.host)) {
     ENV = 'prod';
   } else if (/test domain name/.test(location.host)) {
     ENV = 'test';
   } else {
     ENV = 'dev';
   }

  return {
    PROD: import.meta.env.PROD,
    DEV: import.meta.env.DEV,
    MODE: import.meta.env.MODE,
    ENV,
  };
}

/**
  * Get the interface prefix
  */
export function getAPI(code = 'api') {
  const host: string = import.meta.env.PROD ? import.meta.env.VITE_APP_API_HOST : location.host;
  const origin = `${location.protocol}//${host}`;
  const basePath = import.meta.env.PROD ? `/${import.meta.env.VITE_APP_SUB_DOMAIN}` : '/dev-api';
  const api = `${origin}${basePath}`; //Basic interface

  switch (code) {
    case 'host':
      return host;
    case 'origin':
      return origin;
    default:
      return api;
  }
}

/**
  * Dynamically introduce static resources
  */
export function getAssetsUrl(name: string) {
  return new URL(`/src/assets/${name}`, import.meta.url).href;
}
