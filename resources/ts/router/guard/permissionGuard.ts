import type { Router } from 'vue-router';
import { pageEnum } from '../../constants';
import { useUserStoreWithOut } from '../../store/modules/user';

export function createPermissionGuard(router: Router) {
  const userStore = useUserStoreWithOut();

  router.beforeEach(async (to, _from, next) => {
    if (to.meta.needLogin && to.path !== pageEnum.LOGIN && !userStore.token) {
      const redirect = to.path || '/';

      next({
        path: pageEnum.LOGIN,
        query: {
          ...to.query,
          redirect,
        },
      });
      return;
    }

    next();
  });
}