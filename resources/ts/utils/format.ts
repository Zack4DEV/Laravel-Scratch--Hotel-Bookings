import { isDef } from './is';

/**
  * Keep decimal point (native toFixed)
  */
export function decimalFormat(n: number | string, digits = 2) {
   const num = Number(n);
   if (Number.isNaN(num)) {
     return '';
   }

   return num.toFixed(digits);
}

/**
  * Numerical display placeholder
  */
export function countPair(n: number | undefined, digits = 2, placeholder = '--') {
   return isDef(n) ? (n >= 0 ? Number(n).toFixed(digits) : placeholder) : placeholder;
}

/**
  * Mobile phone number display is encrypted
  */
export function mobileShow(n: string) {
   return n.replace(n.substring(3, 7), '****');
}

/**
  * Product price display
  */
export function priceIntegerFormat(min: number, max: number) {
   if (max && min !== max) {
     return `${decimalFormat(min)}-${decimalFormat(max)}`;
   }

   return decimalFormat(min);
}