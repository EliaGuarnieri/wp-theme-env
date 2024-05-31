import { defineConfig } from 'vite';
import liveReload from 'vite-plugin-live-reload';

export default defineConfig({
  plugins: [
    liveReload("**/*"),
  ],

  root: 'src',
  build: {
    emptyOutDir: false,
    outDir: 'assets',

    manifest: 'manifest.json',

    rollupOptions: {
      input: {
        main: 'src/assets/js/main.js',
      },
      output: {
        entryFileNames: 'js/[name].min.js',
        assetFileNames: 'css/style.min.css',
      }
    },

    minify: true,
    write: true,
  },
  server: {
    strictPort: true,
    https: false,
    port: 5173,
    host: '0.0.0.0',
  }
});