import type { AxiosRequestConfig, AxiosInstance, AxiosResponse, AxiosError } from 'axios';
import axios from 'axios';
import qs from 'qs';
import { getAPI } from '@/utils';
import { RequestOptions, CustomRequestConfig, ServiceResultCodeEnum, ServiceResult, ContentTypeEnum } from './types';
import { httpErrorHandle, serviceErrorHandle } from './handler';
import { useUserStoreWithOut } from '@/store/modules/user';
/**
  * Extended request configuration items, the following options can be overridden in independent interface requests
  */
export let requestOptions: RequestOptions = {};

/**
  * Create axios instance
  */
const instance: AxiosInstance = axios.create({
   //Basic interface address
   baseURL: getAPI(),
   // Request timeout event
   timeout: 5 * 1000,
   // Use form-urlencoded format, that is, pseudo form
   headers: {
     'Content-Type': ContentTypeEnum.FORM_URLENCODED,
   },
});

/**
  * Request interceptor
  */
instance.interceptors.request.use((config: AxiosRequestConfig) => {
   //Append token
   // userStore.getToken && (config.headers.token = userStore.getToken);
   const userStore = useUserStoreWithOut();
   const joinPayloadData = (data: any) => {
     return { ...data, token: userStore.getToken };
   };

   // Serialize data
   const contentType = config.headers?.['Content-Type'];
   if (contentType === ContentTypeEnum.FORM_URLENCODED) {
     if (['post', 'put', 'patch'].includes(config.method as string)) {
       config.data = qs.stringify(joinPayloadData(config.data));
     }

     if (['delete', 'get', 'head'].includes(config.method as string)) {
       config.params = joinPayloadData(config.params);
     }
   }

   return config;
});

/**
  * Response interceptor
  */
instance.interceptors.response.use(
   (response: AxiosResponse<any>) => {
     const result: ServiceResult = response.data;
     const { code } = result;

     // Without any processing, return the native response directly
     if (requestOptions.isReturnNativeResponse) {
       return response;
     }

     // Without any processing, return the data directly
     if (!requestOptions.isTransformResponse) {
       return result;
     }

     if (Number(code) === ServiceResultCodeEnum.SUCCESS) {
       return result;
     } else if (Number(code) === ServiceResultCodeEnum.NO_DATA) {
       result.data = null;
       return result;
     } else {
       serviceErrorHandle(result);
       return Promise.reject(result);
     }
   },
   (error: AxiosError) => {
     const result = error?.response?.data;

     if (result) {
       serviceErrorHandle(result);
     } else {
       httpErrorHandle(error);
     }

     return Promise.reject(error);
   },
);

/**
  * General request function
  */
export function request<T = ServiceResult>(config: CustomRequestConfig): Promise<T> {
   requestOptions = {
     isTransformResponse: true,
     isReturnNativeResponse: false,
     errorMessageMode: 'message',
     networkErrorMessageMode: 'message',
     ...config.requestOptions,
   };

   return new Promise((resolve, reject) => {
     instance
       .request<any, AxiosResponse<ServiceResult>>(config)
       .then((res: AxiosResponse<ServiceResult>) => {
         resolve(res as unknown as Promise<T>);
       })
       .catch((e: Error | AxiosError) => {
         reject(e);
       });
   });
}