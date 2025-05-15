import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import tailwindcss from 'tailwindcss';
import autoprefixer from 'autoprefixer';
import { resolve } from 'path';

export default defineConfig({
    plugins: [
        react(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js']
        }),
    ],
    css: {
        postcss: {
            plugins: [
                tailwindcss(resolve(__dirname, './tailwind.config.js')),
                autoprefixer,
            ],
        },
    },
    compilerOptions: {
        "jsx": "react-jsx"
    },
});
