# 🖼️ Portfolio Romain SAPET

Ce repository contient le code source de mon portfolio [disponible ici](https://hwxmca.fr/).

## 🧱 Choix techniques

Ce projet utilise:

- `Svelte` en tant que framework front-end
- `SvelteKit` en tant que générateur de site statique (SSG)
- `TailwindCSS` en tant que librairie CSS
- `Three.js` & `Threlte (Core & Extras)` en tant que librairie 3D et librairie de composants Svelte
- `Highlight.js` en tant que librairie de coloration syntaxique

## 📝 Développement

Ce projet est installable avec tout les gestionaires de paquest dérivés de `npm`. Il est cepandant conseillé d'utiliser pnpm car un `lockfile` est fourni.

```bash
pnpm install
```

Puis démarrer le serveur de développement avec:

```bash
pnpm dev
```

## 📦 Construction

Ce projet est conçu pour être déployé sur un serveur statique classique HTTP + PHP (pour l'envoi de mails de contact).

Pour créer une version de production du site, utilisez la commande:

```bash
pnpm build
```
