<script>
    import Highlight from "svelte-highlight";

    import config from "$lib/projects/nuster-kit/config.json?raw"
    import { json } from "svelte-highlight/languages";
    import "svelte-highlight/styles/github-dark.css";

</script>

<h1 class="mb-8">Nuster</h1>

<h2>Description du projet</h2>

<p class="mt-8">
    Nuster est un projet software construit en micro-services. Il permet de gérer l'automatisation des machines de <a href="https://metalizz.com">Metalizz</a>.
</p>

<p>
    J'ai participé à la création de ce projet en tant que développeur fullstack. J'ai pu y apprendre la gestion de bases de données, 
    l'ochestration de micro-services avec <em>docker-compose</em>, la gestion d'un mono-repo avec <em>PNPM</em>, l'intégration continue avec <em>Github Actions</em> le développement d'API REST avec nodeJS et ExpressJS & le développement front-end a l'aide du framework Svelte & SvelteKIT.
</p>

<p>
    La particularité de Nuster c'est qu'il se connecte à des controlleurs d'Entrées / Sorties physiques via des bus de terrain type <em>ModbusTCP</em> ou <em>EthernetIP™.</em>
</p>

<p>
    Nuster est totalement configurable en fonction de la machine que vous souhaitez équiper. Un fichier de configuration décrit le fonctionnement de votre machine. On pourrait par exemple utiliser Nuster pour votre machine à laver ou votre cafetière!
</p>

<h3 class="mt-8 mb-4">Exemple de configuration</h3>

<div class="max-h-[30rem] rounded-xl overflow-scroll my-6">
    <Highlight language={json} code={config} />
</div>

<h2>Détails techniques</h2>

<h3 class="mt-8 mb-4">Micro-services</h3>

<p class="mt-8">
    Nuster est un projet construit en micro-services. Il est composé de 4 services.
</p>

<ul>
    <li>Nuster-turbine: Partie back-end du projet, lit la configuration, se connecte au controlleurs définis et mets en place les modèles & controlleurs pour la base de données et l'API REST.</li>
    <li>Nuster-desktop: Partie front-end du projet, interface principale de l'utilisateur traduit l'API REST et les données machines et données lisibles et compréhensibles par l'utilisateur, disponible en 3 langues (Françasi, Anglais et Italien).</li>
    <li>Weston: Backend weston pour afficher des fenètres sur l'écran de la machine.</li>
    <li>WPE-Wekbit: Conteneur affichant Webkit sur le backend weston, affiche Nuster-desktop sur l'écran de la machine.</li>
</ul>

<p>Il n'y as pas de service de base de données, car c'est une base SQLite stockée dans un volume.</p>

<h3 class="mt-8 mb-4">Développement</h3>

<p class="mt-8">
    Le projet de nuster est stocké sur Github en mono-repo. Il est composé de 3 packages, 3 librairies et 2 packages pour la simulation d'une machine lors du développement. Chaque package est versionné individuellement.
</p>

<ul>
    <li>Nuster turbine: Projet NodeJS, écrit en Typescript avec ExpressJS pour l'api, Prisma pour la base de données et diverses librairies pour la gestion réseau, les logs et autres.</li>
    <li>Nuster desktop: Projet NodeJS, écrit en HTML, Typescript et CSS avec TailwindCSS pour les styles et Svelte & SvelteKIT pour le framework front-end.</li>
    <li>Nuster typings: Librarie de types, qui décrit les fichiers de configuration et les déonnées échangées dans l'API REST de turbine.</li>
    <li>Nuster misc: Documentation complète de chaque machine ainsi que les fichiers de traduction.</li>
    <li>Nuster machines: Fichiers de configuration de chaque machine.</li>
    <li>Simulation server: Backend qui émule une machine physique pour nuster turbine lors de développement.</li>
    <li>Simulation client: FrontEnd qui permet de modifier les paramètres de la machine émulée.</li>
</ul>

<p></p>

<p class="mt-4 font-semibold text-lg">
    Nuster est l'oeuvre de 3 années de travail, aujourd'hui c'est un logiciel abouti et fonctionnel qui est utilisé par Metalizz pour ses machines. Il m'as permis d'apprendre énormément de choses et de me perfectionner dans le développement web.
</p>