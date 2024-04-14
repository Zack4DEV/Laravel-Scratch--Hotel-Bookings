import pkg from './package.json';
import { fileURLToPath, URL } from 'node:url';
import { defineConfig, loadEnv } from 'vite';
import { createHtmlPlugin } from 'vite-plugin-html';
import viteCompression from 'vite-plugin-compression2';
import type { UserConfig, ConfigEnv } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import vueJsx from '@vitejs/plugin-vue-jsx';
import legacy from '@vitejs/plugin-legacy';
import AutoComponents from 'unplugin-vue-components/vite';
import dayjs from 'dayjs';

const root: string = process.cwd();

const { dependencies, devDependencies, name, version } = pkg;
const appVersion = dayjs().format('YYYYMMDDHHmm');
const lastBuildTime = dayjs().format('YYYY-MM-DD HH:mm:ss');
const __APP_INFO__ = {
  pkg: { dependencies, devDependencies, name, version },
  version: appVersion,
  lastBuildTime,
};


/**
 * Configuring Vite
 *
 * @see https://vitejs.dev/config/
 */

export default defineConfig(({ mode }: ConfigEnv) : UserConfig => {
  const env = loadEnv(mode, root);

    return {
        base: './',
        plugins: [
          vue({
            template: {
              transformAssetUrls: {
                base: null,
                includeAbsolute: false,
              },
            },
          }),
          vueJsx(),         
          viteCompression(),
          laravel({
            input: [
              'resources/ts/main.ts', 

            ],
            refresh: true,
          }),
          AutoComponents({
            dirs: ['resources/ts/components'],
            extensions: ['vue', 'tsx', 'jsx'],
            dts: 'resources/ts/components/auto-components.d.ts',
          }),
          createHtmlPlugin({
            inject: {
              data: {
                title: env.VITE_APP_TITLE,
              },
            },
            minify: true,
          }),
          env.VITE_LEGACY === 'true' ? legacy() : null,
        ],
        server: {
          host: true,
          port: Number(env.VITE_PORT),
          proxy: {
            '/dev-url': {
              target: `https://${env.VITE_APP_HOST}/${env.VITE_APP_SUB_DOMAIN}`, // http://0.0.0.0/
              changeOrigin: true,
              secure: false,
              rewrite: (path) => path.replace(/^\/dev-url/, ''),
            },
          },
        },
        build: {
          emptyOutDir: true,
          sourcemap: false,
          chunkSizeWarningLimit: 1500,
          rollupOptions: {
            external: ['axios']
          },
        },
        resolve: {
          alias: {
            '@': fileURLToPath(new URL('.', import.meta.url)),
            '@assets': fileURLToPath(new URL('resources/assets', import.meta.url)),
            '@ts': fileURLToPath(new URL('resources/ts/', import.meta.url)),
          },
        },
        define: {
          __APP_INFO__: JSON.stringify(__APP_INFO__),
        },
        css: {
          modules: {
            localsConvention: 'camelCaseOnly',
          },
          preprocessorOptions: {
              javascriptEnabled: true,
            },
          },
        }
});
