# NewSiteErp

## Production deployment (Vite manifest)

The app uses Vite for frontend assets. The built files live in `public/build/` and are **not** in git. On the server you must run the build so Laravel can find the manifest:

```bash
npm ci
npm run build
```

This creates `public/build/manifest.json` and the compiled JS/CSS. Without it you get: *Vite manifest not found at: .../public/build/manifest.json*.
