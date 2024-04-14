import type { Router } from "vue-router"

import { useAppStoreWithOut } from "../../store/modules/app"
import { createPageTitleGuard } from "./pageTitleGuard"

let appLoadedFlag: boolean

export function setupRouterGuard(router: Router) {
    const appStore = useAppStoreWithOut()

    router.beforeEach(async (to, from, next) => {
        console.log("[route]", from.path, to.path)
        if (!appLoadedFlag) {
            appLoadedFlag = true

            await appStore.updateTheme()
        }

        next()
    })
    createPageTitleGuard(router)
}
