import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    server: {
        port:9300,
        hmr: {
            host: 'localhost',
        },
        watch: {
            usePolling: true
        },
        proxy: {
            // string shorthand: http://localhost:5173/foo -> http://localhost:4567/foo
            // '/api': 'http://172.17.0.1:9100/admin/',
        }
    },
    plugins: [
        laravel({
            input: "resources/js/app.js",
            ssr: "resources/js/ssr.js",
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    build: {
        chunkSizeWarningLimit: 16000
    },
    ssr: {
        noExternal: ["vue", "@protonemedia/laravel-splade"]
    },
});
