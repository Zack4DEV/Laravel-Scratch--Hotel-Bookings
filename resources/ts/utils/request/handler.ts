import type { AxiosError } from 'axios';
import { ServiceResultCodeEnum, ServiceResult } from './types';
import { useUserStoreWithOut } from '@/store/modules/user';
import { showToast, closeToast } from 'vant';
import { requestOptions } from './index';

/**
  *Business error
  * @param {ServiceResult} res return data agreed by the business
  * @param {number} res.code Business agreed error code
  * @param {string} res.msg Business error message
  * @param {*} res.data
  */
export function serviceErrorHandle(res: ServiceResult) {
   const { code, msg } = res;
   if (Number(code) === ServiceResultCodeEnum.LOGIN_EXPIRED) {
     closeToast();

     const userStore = useUserStoreWithOut();
     userStore.logout({ goLogin: true });
   } else {
     if (requestOptions.errorMessageMode === 'message') {
       showToast({
         message: msg || 'Result Error',
         duration: 3 * 1000,
       });
     }
   }
}

/**
  *HTTP error
  */
export function httpErrorHandle(error: AxiosError) {
   // console.log('[httpErrorHandle]', error);
   // console.log('[httpErrorHandle]', error.toString());

   let errMessage = ''; // HTTP Error

   if (error?.response) {
     const { status } = error.response;

     switch (status) {
       case 403:
         errMessage = `${status} Network request rejected`;
         break;
       case 404:
         errMessage = `${status} network request does not exist`;
         break;
       case 500:
         errMessage = `${status} Server internal error`;
         break;
       default:
         errMessage = `${status || error.message}`;
         break;
     }
   }

   //Network error
   if (error?.message) {
     if (error.message.includes('timeout')) {
       errMessage = 'Request timeout';
     }
     if (error.message.includes('Network Error')) {
       errMessage = 'The current network is unavailable, please check your network settings';
     }
   }

   if (errMessage) {
     if (requestOptions.networkErrorMessageMode === 'message') {
       showToast({
         message: errMessage,
         duration: 3 * 1000,
       });
     }
   }
}