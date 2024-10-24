import { defineConfig } from 'astro/config';
import UnoCSS from 'unocss/astro'

import svelte from '@astrojs/svelte';

import sitemap from '@astrojs/sitemap';

// https://astro.build/config
export default defineConfig({
    site: 'https://grupocepromex.com/',
    integrations: [UnoCSS(
      {injectReset: true}
    ), svelte(), sitemap()],
    vite: {
        build: {
          //Personalizar los nombres de los archivos generados
          rollupOptions: {
            output: {
              entryFileNames: 'assets/js/app.[hash].js',
              chunkFileNames: 'assets/js/astro.[hash].js',
              assetFileNames: 'assets/css/style.[hash][extname]',
            },
          },
        },
      },

});