import { defineStore } from 'pinia';
import { store } from '../index';
import { theme, tabBar } from '../../constants/app';
import type { ITheme } from '../../constants/app/types';
import { goodStorage, getClientInfo, deepClone, fromCamelCase } from '../../utils/';
import { appendStyle } from '../../utils/web/index';

export interface AppStore {
  theme: NonNullable<ITheme>;
  tabBar: NonNullable<Recordable>;
}

export const useAppStore = defineStore({
  id: 'app',
  state: (): AppStore => ({
    theme: getLocalTheme(),
    tabBar,
  }),
  getters: {
    getTheme: (state) => state.theme,
    getTabBar: (state) => state.tabBar,
  },
  actions: {
    async updateTheme(payload: Recordable = {}) {
      const myTheme: ITheme = { ...deepClone(this.theme), ...payload };

      //Switch theme dark/light
      if (payload.mode === 'system') {
        myTheme.mode = getClientInfo().theme;
      }
      if (myTheme.mode === 'dark') {
        document.documentElement.classList.add('dark');
      } else {
        document.documentElement.classList.remove('dark');
      }

      //Generate theme variables
      const colorVarList = Object.keys(myTheme.colors).map(
        (key) => `--color-${fromCamelCase(key, '-')}: ${myTheme.colors[key]};`,
      );
      const vanVarList = Object.keys(myTheme.vanThemeOverrides).map(
        (key) =>
          `--van-${fromCamelCase(key, '-')}: ${
            myTheme.colors[myTheme.vanThemeOverrides[key]] ?? myTheme.vanThemeOverrides[key]
          };`,
      );

      const cssText = `:root { ${[...colorVarList, ...vanVarList].join('\n')} }`;
      appendStyle(cssText, 'theme');

      this.theme = myTheme;
      goodStorage.set('theme', myTheme);
    },
    
    toggleThemeMode() {
      this.updateTheme({
        mode: this.theme.mode === 'dark' ? 'light' : 'dark',
      });
    },
  },
});

export function useAppStoreWithOut() {
  return useAppStore(store);
}

function getLocalTheme() {
  const result = goodStorage.get('theme', theme);
  if (result.version === theme.version) {
    return result;
  } else {
    return theme;
  }
}