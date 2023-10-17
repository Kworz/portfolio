<script>
    import Sociallink from "$lib/sociallink.svelte";
    import { Highlight } from "svelte-highlight";
    import { javascript } from "svelte-highlight/languages";

    import pocketbaseCode from "$lib/projects/nomenclaturize/pocketbase-example?raw";
    import "svelte-highlight/styles/github-dark.css";
</script>

<h1 class="mb-8">Nomenclaturize</h1>

<Sociallink href="https://github.com/kworz/nomenclaturize2" icon="/images/socials/github.svg" iconAlt="Logo Github">Consultez ce projet sur github</Sociallink>

<p class="text-orange-500 font-semibold mt-4">⚠️ Attention: certaines données ont été volontairement effacées des captures d'écran dans un soucis de secret industriel.</p>

<h2 class="mt-8">Description du projet</h2>

<p class="mt-8">
    Nomenclaturize est un micro-ERP capable de gérer des stocks, des nomenclatures, des listes d'achat et des commandes. Un outil de CRM est aussi partiellement intégré.
</p>

<img src="/projects/nomenclaturize/nomenclaturize-items-list.png" alt="Liste des articles" class="h-96 mx-auto my-8 rounded-lg ring-2 ring-white" />

<p>
    Ce projet est un projet personnel, je l'ai cependant utilisé dans le cadre professionel au sein de Metalizz.
    J'ai créé cet outil de toute pièces pour mieux gérer la chaine logistique pour la production des machines de Metalizz.
</p>

<p>
    Ce projet est construit autour d'un back-end <a href="https://pocketbase.io/">Pocketbase</a> et d'un front-end <a href="https://svelte.dev">Svelte / SvelteKit</a>.
</p>

<p>
    L'utilisation de Pocketbase permet d'avancer rapidement sur la conception de l'outil car le back-end est utilisable rapidement et simplement en configurant les formats de données et les relations de la base de donnée. 
</p>

<img src="/projects/nomenclaturize/pocketbase.png" alt="Interface de pocketbase" class="h-96 mx-auto my-8 rounded-lg ring-2 ring-white" />

<p>La librairie Javascript de Pocketbase permet également un développement rapide sans prise de tête.</p>

<div class="max-h-[30rem] rounded-xl overflow-scroll my-8">
    <Highlight language={javascript} code={pocketbaseCode} />
</div>

<p>Ces 3 lignes, permettent facilement d'obtenir les articles présents dans la base de donnée.</p>

<h2 class="mt-8 mb-4">Capacités de l'outil</h2>

<h3>Gestion des stocks</h3>

<p>Nomenclaturize est a la base un outil de gestion des stocks avec une simple, entrée / sortie du stock. Est ensuite venu la possibilité de définir plusieurs zones de stockages. La gestion devient alors multi-inventaires.</p>

<p>Il est aussi possible de définir des images d'articles pour mieux représenter les article sdnas la base et rendre la compréhension pour l'utilisateur final plus rapide.</p>

<img src="/projects/nomenclaturize/nomenclaturize-item-details.png" alt="Détails d'un article" class="h-96 mx-auto my-8 rounded-lg ring-2 ring-white" />

<h3>Listes & assemblages</h3>

<p>
    Les machines de chez Metalizz sont conçues avec des sous-assemblages imbriqués, Nomenclaturize permet de définir les assembmlages et sous assemblages pour définir une Machine ou un objet fini.
</p>

<img src="/projects/nomenclaturize/nomenclaturize-assembly.png" alt="Vue d'un assemblage" class="h-96 mx-auto my-8 rounded-lg ring-2 ring-white" />

<p>Ces assemblages peuvent ensuites être déclinés en listes d'achat ou de présence pour permettre a l'utilisateur de construire une machine et s'assurer de la présence de tout les articles</p>

<img src="/projects/nomenclaturize/nomenclaturize-buylist.png" alt="Liste d'achat d'un assemblage" class="h-96 mx-auto my-8 rounded-lg ring-2 ring-white" />

<h3>Commandes</h3>

<p>
    Gérer les approvisionement c'est une des fonctionnalité de nomenclaturize, vous pouvez créer des commandes pour tout les articles de la base. 
    Il est aussi possible de générer directement des commandes depuis les manques dans une liste d'achat, cela permet d'éviter les erreurs de commandes.
</p>

<img src="/projects/nomenclaturize/nomenclaturize-order.png" alt="Commande de deux articles" class="h-96 mx-auto my-8 rounded-lg ring-2 ring-white" />

<p>
    Utiliser Nomenclaturize pour gérer les commandes permet de garder un historique des commandes et d'avoir le <em>prix moyen unitaire pondéré (PUMP)</em> de chaque article.
</p>

<p class="mt-4 font-semibold text-lg">
    Nomenclaturize est un outil qui as réellement amélioré la gestion des stocks et des commandes chez Metalizz, il est encore en développement et je compte bien l'améliorer encore.
    C'est un outil avec un fort potentiel et qui peut être utilisé dans d'autres contextes.
</p>

<p class="mt-4 font-semibold text-lg">
    Ce projet m'as permis d'en apprendre plus et de mieux comprendre les rouages de la gestion des stocks, ses enjeux, les commandes et la gestion des affaires au sein d'une entreprise.
</p>