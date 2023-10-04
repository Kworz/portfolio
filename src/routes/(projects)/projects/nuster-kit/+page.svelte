<script>
    import Highlight from "svelte-highlight";

    import config from "$lib/projects/nuster-kit/config.json?raw";
    import changeset from "$lib/projects/nuster-kit/changeset.md?raw";
    import { markdown , json } from "svelte-highlight/languages";
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

<img src="/projects/nuster-kit/nuster-desktop-home.png" alt="Interface de nuster" class="h-96 mx-auto my-8" />

<p>
    La particularité de Nuster c'est qu'il se connecte à des controlleurs d'Entrées / Sorties physiques via des bus de terrain type <em>ModbusTCP</em> ou <em>EthernetIP™.</em>
</p>

<p>
    Nuster est configurable en fonction de la machine que vous souhaitez équiper. Un fichier de configuration décrit le fonctionnement de votre machine. On pourrait par exemple utiliser Nuster pour votre machine à laver ou votre cafetière!
</p>

<h3 class="mt-8 mb-4">Exemple de configuration</h3>

<div class="max-h-[30rem] rounded-xl overflow-scroll my-8">
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

<img src="/projects/nuster-kit/services.svg" alt="Interface de nuster" class="h-96 mx-auto my-8 bg-white p-4 rounded-lg" />

<p>Il n'y as pas de service de base de données, car c'est une base SQLite stockée dans un volume.</p>

<h3 class="mt-8 mb-4">Développement</h3>

<p class="mt-8">
    Le projet de nuster est stocké sur Github en mono-repo. Il est composé de 2 packages principaux, 3 librairies, 2 packages pour la simulation d'une machine lors du développement et 1 package qui permet la gestion d'un parc de machines. Chaque package est versionné individuellement.
</p>

<ul>
    <li>Nuster turbine: Projet NodeJS, écrit en Typescript avec ExpressJS pour l'api, Prisma pour la base de données et diverses librairies pour la gestion réseau, les logs et autres.</li>
    <li>Nuster desktop: Projet NodeJS, écrit en HTML, Typescript et CSS avec TailwindCSS pour les styles et Svelte & SvelteKIT pour le framework front-end.</li>
    <li>Nuster typings: Librarie de types, qui décrit les fichiers de configuration et les déonnées échangées dans l'API REST de turbine.</li>
    <li>Nuster misc: Documentation complète de chaque machine ainsi que les fichiers de traduction.</li>
    <li>Nuster machines: Fichiers de configuration de chaque machine.</li>
    <li>Simulation server: Backend qui émule une machine physique pour nuster turbine lors de développement.</li>
    <li>Simulation client: FrontEnd qui permet de modifier les paramètres de la machine émulée.</li>
    <li>Nuster dashboard: Projet NodeJS, écrit en HTML, Typescript et CSS avec TailwindCSS pour les styles et Svelte & SvelteKIT pour le framework front-end.</li>
</ul>

<p>
    J'ai réalisé le developpement de tout ces outils avec Visual Studio Code, un IDE qui s'adapte bien au technologies Web et Typescript.
</p>

<h3 class="mt-8 mb-4">CI & CD</h3>

<p class="mt-8">
    J'ai utilisé Github Actions pours réaliser l'intégration continue et le déploiement continu de Nuster. J'ai mis en place plusieurs workflow pour simplifier le développement et le déploiement.
</p>

<p>
    Le repository utilise un versionning a l'aide de <em>Changesets</em>. Cet utilitaire incrémente les différents packages du projet a l'aide de changesets.
</p>

<div class="max-h-[30rem] rounded-xl overflow-scroll my-8">
    <Highlight language={markdown} code={changeset} />
</div>

<p>
    Lors d'un push sur n'importe quelle branche, un workflow <em>release.yaml</em>, s'execute. Ce workflow vérifie les changesets et quels sont les paquets a publier. Les paquets sont publiés sur <em>Github packages</em> et un tag git est créé.
</p>

<p>
    A la suite de l'execution du workflow <em>release.yaml</em>, d'autre script sont executés en fonction des paquets mis a jour.
</p>

<ul>
    <li>Si un des paquets turbine, desktop, turbine-machines, typings ou misc est mis a jour alors, le workflow <em>release-balena.yaml</em> est executé pour mettre a jour les images de conteneurs présents sur les machines.</li>
    <li>Si le paquet misc est mis à jour, le workflow <em>release-docs.yaml</em> est executé, il génère les documentations de chaque machines. Ce script est exécuté en matrice pour le rendre plus rapide.</li>
    <li>Si le paquet dashboard est mis à jour, le workflow <em>release-dashboard.yaml</em> est executé. Il constuit le dashboard de management des machines et le publie sur un serveur.</li>
</ul>

<img src="/projects/nuster-kit/cd-github.png" alt="Intégration continue" class="w-2/3 mx-auto my-8 rounded-lg" />

<p>
    Lors de la création d'une Pull-Request sur github, le bot <em>Changesets</em> vérifie que les changements sont bien décrits dans un changeset. Si ce n'est pas le cas, il demande a l'utilisateur de créer un changeset.
</p>

<img src="/projects/nuster-kit/changeset-github.png" alt="Bot changeset sur github" class="w-2/3 mx-auto my-8 rounded-lg" />

<p>
    Lors des mises à jours de la branche de la pull-request, les tests sont executés. Une version draft des conteneurs est publiée, elle est applicable sur une machine pour tester la pull-request en hardware.
</p>

<p>
    Lors de la fermeture d'une pull-request, les versions draft des conteneurs de la branche sont supprimées.
</p>

<h2 class="mt-8">Note personelle</h2>

<p class="mt-4 font-semibold text-lg">
    Nuster est l'oeuvre de 3 années de travail, aujourd'hui c'est un logiciel abouti et fonctionnel qui est utilisé par Metalizz pour ses machines. Il m'as permis d'apprendre énormément de choses dans plusieurs dommaines qui touchent au développement web mais pas que. Le developpement d'un logiciel pour une machine physique est très différent des code habituels du web.
    Il faut prendre en compte les contraintes de la machine, les contraintes de l'utilisateur, les contraintes de l'entreprise et les contraintes de l'industrie. C'est un projet qui m'as permis de me confronter à des problématiques que je n'avais jamais rencontré auparavant.
</p>