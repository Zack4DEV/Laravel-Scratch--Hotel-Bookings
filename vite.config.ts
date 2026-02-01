import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.tsx'], 
            refresh: true,
        }),
        react(),
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js'),
            '@admin': path.resolve(__dirname, 'resources/js/admin'),
            '@components': path.resolve(__dirname, 'resources/js/components'),
            '@navigation': path.resolve(__dirname, 'resources/js/navigation'),
            '@utils': path.resolve(__dirname, 'resources/js/utils'),
            '@hotel': path.resolve(__dirname, 'resources/js/components/Hotel'),
            '@screens': path.resolve(__dirname, 'resources/js/admin/screens'),
            '@adminComponents': path.resolve(__dirname, 'resources/js/admin/components'),
        },
    },
    server: {
        host: true,
        hmr: {
            host: 'localhost',
        },
    },
    build: {
        outDir: 'public/build',
        manifest: true,
        rollupOptions: {
            output: {
                manualChunks: {
                    'vendor': ['react', 'react-dom', 'react-router-dom', 'axios', 'zustand'],
                }
            }
        }
    }
});
