import { defineConfig } from 'vite';
import liveReload from 'vite-plugin-live-reload';
import tailwindcss from 'tailwindcss';

export default defineConfig({
  plugins: [
    liveReload("src/**/*"),
  ],
  root: '.',
  build: {
    emptyOutDir: false,
    assetsDir: 'css',

    manifest: 'manifest.json',

    rollupOptions: {
      input: {
        main: 'src/assets/js/main.js',
      },
      output: {
        entryFileNames: 'src/js/[name].min.js',
        dir: 'assets',
        assetFileNames: 'src/css/style.min.css',
      }
    },

    minify: true,
    write: true,
  },

  server: {
    cors: true,
    https: false,
    port: 5173,
    host: '0.0.0.0',

    hmr: {
      host: 'localhost',
      client: 'http://localhost:5173/@vite/client',
      base: 'http://localhost:5173/',
      active: true,
    }
  }
});