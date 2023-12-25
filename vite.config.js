import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'
import ViteSassPlugin from 'vite-plugin-sass';

export default defineConfig({
    plugins: [
        //ViteSassPlugin(),
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
            resolve: {
                alias: {
                    '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
                }
            },
        }),
    ],
});
