import { defineConfig } from 'vite';

export default defineConfig({
    publicDir: false,

    input: 'resources/js/app.js',

    build: {
        outDir: 'public/assets',
        emptyOutDir: true,
        manifest: true
    }
});