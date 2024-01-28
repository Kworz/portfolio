<script>
    import "svelte-highlight/styles/github-dark.css";

    import Sociallink from "$lib/sociallink.svelte";
    import { Highlight } from "svelte-highlight";
    import { javascript } from "svelte-highlight/languages";

    import prismaCode from "$lib/projects/mink/prisma-example?raw";
    import prismaSchemaCode from "$lib/projects/mink/prisma-schema.prisma?raw"
</script>

<h1 class="mb-8">mink</h1>

<Sociallink href="https://github.com/kworz/mink" icon="/images/socials/github.svg" iconAlt="Logo Github">Consultez ce projet sur github</Sociallink>

<p class="text-orange-500 font-semibold mt-4">⚠️ Attention: certaines données ont été volontairement effacées des captures d'écran dans un soucis de secret industriel.</p>

<h2 class="mt-8">Description du projet</h2>

<p class="mt-8">
    mink est un micro-ERP capable de gérer des stocks, des nomenclatures, des listes d'achat et des commandes. Un outil de CRM est aussi partiellement intégré.
</p>

<img src="/projects/mink/mink-items-list.png" alt="Liste des articles" class="h-96 mx-auto my-8 rounded-lg ring-2 ring-white" />

<p>
    Ce projet est un projet personnel, je l'ai cependant utilisé dans le cadre professionel au sein de Metalizz.
    J'ai créé cet outil de toute pièces pour mieux gérer la chaine logistique pour la production des machines de Metalizz.
</p>

<p>
    Ce projet est construit du framework <a href="https://kit.svelte.dev">SvelteKit</a>.
    Ce framework utilise la librairie <a href="https://svelte.dev">Svelte</a> pour générer des pages statiques et dynamiques.
</p>

<p>
    Pour le front-end, j'utilise <a href="https://tailwindcss.com">TailwindCSS</a> pour gérer le style des composants et des pages.
    J'utilise aussi <a href="https://heroicons.com">Heroicons</a> pour les icones.
</p>

<p>
    Pour gérer la base de donnée, j'utilise <a href="https://prisma.io">Prisma</a>, un ORM (MOR en bon français) qui permet de gérer une base de donnée avec un langage de programmation.
    Pour la base de donnée, j'ai choisi <a href="https://www.postgresql.org/">PostgreSQL</a> pour sa robustesse et sa fiabilité.
</p>

<p>
    Le fichier de Schéma de prisma est un fichier essentiel qui définit le squelette de la base de donnée.
</p>

<div class="max-h-[30rem] rounded-xl overflow-scroll my-8">
    <Highlight language={javascript} code={prismaSchemaCode} />
</div>

<p>
    La librairie Javascript de Prisma permet d'intéragir avec la base de donnée tout en gérant la <em>Sureté de types</em>, cela permet d'éviter les confusions lors du développment.
</p>

<div class="max-h-[30rem] rounded-xl overflow-scroll my-8">
    <Highlight language={javascript} code={prismaCode} />
</div>

<p>Ces quelques lignes, permettent facilement d'obtenir les articles présents dans la base de donnée. On peut aussi les filter, les ordonner et ajouter des données liées a cet article directement dans la meme requete.</p>

<h2 class="mt-8 mb-4">Capacités de l'outil</h2>

<h3>Gestion des stocks</h3>

<p>mink est a la base un outil de gestion des stocks avec une simple, entrée / sortie du stock. Est ensuite venu la possibilité de définir plusieurs zones de stockages. La gestion devient alors multi-inventaires.</p>

<p>Il est aussi possible de définir des images d'articles pour mieux représenter les article sdnas la base et rendre la compréhension pour l'utilisateur final plus rapide.</p>

<img src="/projects/mink/mink-item-details.png" alt="Détails d'un article" class="h-96 mx-auto my-8 rounded-lg ring-2 ring-white" />

<h3>Listes & assemblages</h3>

<p>
    Les machines de chez Metalizz sont conçues avec des sous-assemblages imbriqués, mink permet de définir les assemblages et sous assemblages pour définir une machine ou un objet fini.
</p>

<img src="/projects/mink/mink-assembly.png" alt="Vue d'un assemblage" class="h-96 mx-auto my-8 rounded-lg ring-2 ring-white" />

<p>Ces assemblages peuvent ensuites être déclinés en listes d'achat ou de présence pour permettre a l'utilisateur de construire une machine et s'assurer de la présence de tout les articles</p>

<img src="/projects/mink/mink-buylist.png" alt="Liste d'achat d'un assemblage" class="h-96 mx-auto my-8 rounded-lg ring-2 ring-white" />

<h3>Commandes</h3>

<p>
    Gérer les approvisionement c'est une des fonctionnalité de mink, vous pouvez créer des commandes pour tout les articles de la base. 
    Il est aussi possible de générer directement des commandes depuis les manques dans une liste d'achat, cela permet d'éviter les erreurs de commandes.
</p>

<img src="/projects/mink/mink-order.png" alt="Commande de deux articles" class="h-96 mx-auto my-8 rounded-lg ring-2 ring-white" />

<p>
    Utiliser mink pour gérer les commandes permet de garder un historique des commandes et d'avoir le <em>prix moyen unitaire pondéré (PUMP)</em> de chaque article.
</p>

<p class="mt-4 font-semibold text-lg">
    mink est un outil qui as réellement amélioré la gestion des stocks et des commandes chez Metalizz, il est encore en développement et je compte bien l'améliorer encore.
    C'est un outil avec un fort potentiel et qui peut être utilisé dans d'autres contextes.
</p>

<p class="mt-4 font-semibold text-lg">
    Ce projet m'as permis d'en apprendre plus et de mieux comprendre les rouages de la gestion des stocks, ses enjeux, les commandes et la gestion des affaires au sein d'une entreprise.
</p>