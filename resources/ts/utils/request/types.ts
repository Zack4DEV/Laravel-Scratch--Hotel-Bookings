import type { AxiosRequestConfig } from 'axios';

export interface CustomRequestConfig extends AxiosRequestConfig {
  requestOptions?: RequestOptions;
}

export type ErrorMessageMode = 'none' | 'message' | undefined;

export interface RequestOptions {
   /** Whether the returned data needs to be processed */
   isTransformResponse?: boolean;
   /** Whether to directly return the native response */
   isReturnNativeResponse?: boolean;
   /** Message prompt type */
   errorMessageMode?: ErrorMessageMode;
   /** Network message prompt type */
   networkErrorMessageMode?: ErrorMessageMode;
}

export enum ContentTypeEnum {
   // json
   JSON = 'application/json',
   // form-urlencoded qs
   FORM_URLENCODED = 'application/x-www-form-urlencoded',
   // form-data upload
   FORM_DATA = 'multipart/form-data',
}

export interface HttpResult<T = any> {
   status: number;
   message?: string;
   response?: T;
}

export interface ServiceResult<T = any> {
   code: number;
   msg: string;
   data?: T;
}

/**
  * Global error code agreed by the business
  */
export enum ServiceResultCodeEnum {
   /** Response successful */
   SUCCESS = 0,
   /** Server internal error */
   ERROR = -1,
   /** No data */
   NO_DATA = 700,
   /** The current login token is invalid, please log in again */
   LOGIN_EXPIRED = 2000,
}
