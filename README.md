# Instrucciones:

@media (min-width: 480px) {  }
@media (min-width: 768px) {  }
@media (min-width: 1023px) {  }
@media (min-width: 1280px) {  }
@media (min-width: 1536px) {  }
@media (min-width: 768px) and (max-width: 1279px) { }

### eliminar GIT
rm -rf .git
git config --global http.postBuffer 157286400
git config --global http.postBuffer 0

| Command                   | Action                                           |
| :------------------------ | :----------------------------------------------- |
| `npm install`             | Installs dependencies                            |
| `npm run dev`             | Starts local dev server at `localhost:4321`      |
| `npm run build`           | Build your production site to `./dist/`          |
| `npm run preview`         | Preview your build locally, before deploying     |
| `npm run astro ...`       | Run CLI commands like `astro add`, `astro check` |
| `npm run astro -- --help` | Get help using the Astro CLI                     |

