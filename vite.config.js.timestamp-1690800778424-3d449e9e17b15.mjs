// vite.config.js
import { defineConfig } from "file:///var/www/node_modules/vite/dist/node/index.js";
import laravel from "file:///var/www/node_modules/laravel-vite-plugin/dist/index.mjs";
import vue from "file:///var/www/node_modules/@vitejs/plugin-vue/dist/index.mjs";
var vite_config_default = defineConfig({
  server: {
    port: 9300,
    hmr: {
      host: "localhost"
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
      refresh: true
    }),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false
        }
      }
    })
  ],
  ssr: {
    noExternal: ["vue", "@protonemedia/laravel-splade"]
  }
});
export {
  vite_config_default as default
};
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsidml0ZS5jb25maWcuanMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbImNvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9kaXJuYW1lID0gXCIvdmFyL3d3d1wiO2NvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9maWxlbmFtZSA9IFwiL3Zhci93d3cvdml0ZS5jb25maWcuanNcIjtjb25zdCBfX3ZpdGVfaW5qZWN0ZWRfb3JpZ2luYWxfaW1wb3J0X21ldGFfdXJsID0gXCJmaWxlOi8vL3Zhci93d3cvdml0ZS5jb25maWcuanNcIjtpbXBvcnQgeyBkZWZpbmVDb25maWcgfSBmcm9tIFwidml0ZVwiO1xuaW1wb3J0IGxhcmF2ZWwgZnJvbSBcImxhcmF2ZWwtdml0ZS1wbHVnaW5cIjtcbmltcG9ydCB2dWUgZnJvbSBcIkB2aXRlanMvcGx1Z2luLXZ1ZVwiO1xuXG5leHBvcnQgZGVmYXVsdCBkZWZpbmVDb25maWcoe1xuICAgIHNlcnZlcjoge1xuICAgICAgICBwb3J0OjkzMDAsXG4gICAgICAgIGhtcjoge1xuICAgICAgICAgICAgaG9zdDogJ2xvY2FsaG9zdCcsXG4gICAgICAgIH0sXG4gICAgICAgIHdhdGNoOiB7XG4gICAgICAgICAgICB1c2VQb2xsaW5nOiB0cnVlXG4gICAgICAgIH0sXG4gICAgICAgIHByb3h5OiB7XG4gICAgICAgICAgICAvLyBzdHJpbmcgc2hvcnRoYW5kOiBodHRwOi8vbG9jYWxob3N0OjUxNzMvZm9vIC0+IGh0dHA6Ly9sb2NhbGhvc3Q6NDU2Ny9mb29cbiAgICAgICAgICAgIC8vICcvYXBpJzogJ2h0dHA6Ly8xNzIuMTcuMC4xOjkxMDAvYWRtaW4vJyxcbiAgICAgICAgfVxuICAgIH0sXG4gICAgcGx1Z2luczogW1xuICAgICAgICBsYXJhdmVsKHtcbiAgICAgICAgICAgIGlucHV0OiBcInJlc291cmNlcy9qcy9hcHAuanNcIixcbiAgICAgICAgICAgIHNzcjogXCJyZXNvdXJjZXMvanMvc3NyLmpzXCIsXG4gICAgICAgICAgICByZWZyZXNoOiB0cnVlLFxuICAgICAgICB9KSxcbiAgICAgICAgdnVlKHtcbiAgICAgICAgICAgIHRlbXBsYXRlOiB7XG4gICAgICAgICAgICAgICAgdHJhbnNmb3JtQXNzZXRVcmxzOiB7XG4gICAgICAgICAgICAgICAgICAgIGJhc2U6IG51bGwsXG4gICAgICAgICAgICAgICAgICAgIGluY2x1ZGVBYnNvbHV0ZTogZmFsc2UsXG4gICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIH0sXG4gICAgICAgIH0pLFxuICAgIF0sXG4gICAgc3NyOiB7XG4gICAgICAgIG5vRXh0ZXJuYWw6IFtcInZ1ZVwiLCBcIkBwcm90b25lbWVkaWEvbGFyYXZlbC1zcGxhZGVcIl1cbiAgICB9LFxufSk7XG4iXSwKICAibWFwcGluZ3MiOiAiO0FBQTBNLFNBQVMsb0JBQW9CO0FBQ3ZPLE9BQU8sYUFBYTtBQUNwQixPQUFPLFNBQVM7QUFFaEIsSUFBTyxzQkFBUSxhQUFhO0FBQUEsRUFDeEIsUUFBUTtBQUFBLElBQ0osTUFBSztBQUFBLElBQ0wsS0FBSztBQUFBLE1BQ0QsTUFBTTtBQUFBLElBQ1Y7QUFBQSxJQUNBLE9BQU87QUFBQSxNQUNILFlBQVk7QUFBQSxJQUNoQjtBQUFBLElBQ0EsT0FBTztBQUFBO0FBQUE7QUFBQSxJQUdQO0FBQUEsRUFDSjtBQUFBLEVBQ0EsU0FBUztBQUFBLElBQ0wsUUFBUTtBQUFBLE1BQ0osT0FBTztBQUFBLE1BQ1AsS0FBSztBQUFBLE1BQ0wsU0FBUztBQUFBLElBQ2IsQ0FBQztBQUFBLElBQ0QsSUFBSTtBQUFBLE1BQ0EsVUFBVTtBQUFBLFFBQ04sb0JBQW9CO0FBQUEsVUFDaEIsTUFBTTtBQUFBLFVBQ04saUJBQWlCO0FBQUEsUUFDckI7QUFBQSxNQUNKO0FBQUEsSUFDSixDQUFDO0FBQUEsRUFDTDtBQUFBLEVBQ0EsS0FBSztBQUFBLElBQ0QsWUFBWSxDQUFDLE9BQU8sOEJBQThCO0FBQUEsRUFDdEQ7QUFDSixDQUFDOyIsCiAgIm5hbWVzIjogW10KfQo=
