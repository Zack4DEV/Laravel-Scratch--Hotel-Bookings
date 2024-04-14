import { computed, unref } from 'vue';
import { useRouter } from 'vue-router';

import { useUserStore } from '../../hotel/modules/user';
import { useAppStore } from '../../hotel/modules/app';
import { onMountedOrActivated } from '../core/onMountedOrActivated';

export function usePage() {
  const userStore = useUserStore();
  const appStore = useAppStore();
  const router = useRouter();

  const token = computed(() => userStore.getToken);
  const hasLogin = computed(() => !!unref(token));
  const theme = computed(() => appStore.getTheme);

  function goPage(path: string) {
    router.push({ path });
  }

  function goLogin() {
    router.replace('/');
  }

  function goHome() {
    router.replace('/home');
  }

  return {
    token,
    hasLogin,
    theme,
    //Jump page
    goHome,
    goLogin,
    goPage,
    onMountedOrActivated,
  };
}
