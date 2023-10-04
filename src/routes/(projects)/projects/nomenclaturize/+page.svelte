<script>
    import Sociallink from "$lib/sociallink.svelte";
</script>

<h1 class="mb-8">Nomenclaturize</h1>

<Sociallink href="https://github.com/kworz/nomenclaturize2" icon="/images/socials/github.svg" iconAlt="Logo Github">Consultez ce projet sur github</Sociallink>

<h2 class="mt-8">Description du projet</h2>

<p class="mt-8">
    Nomenclaturize est un micro-ERP capable de gérer des stocks, des nomenclatures, des listes d'achat et des commandes.
</p>

<p>
    Ce projet est un projet personnel, je l'ai utilisé cependant dans le cadre professionel au sein de Metalizz.
    J'ai créé cet outil de toute pièces pour mieux gérer la chaine logistique pour la production des machines de Metalizz.bind:
</p>

<p>
    Ce projet est construit autour d'un back-end <em>Pocketbase</em> et d'un front-end <em>Svelte</em>.
</p>

<p>
    L'utilisation de pocketbase permet d'avancer rapidement sur la conception de l'outil car le back-end est abstrait directement grace a l'interface de pocketbase. L'utilisation du la librairie de pocketbase dans le front-end svelte permet un développement rapide.
</p>

<h3 class="mt-8 mb-4">Capacités de l'outil</h3>

<h4>Gestion des stocks</h4>

<p>Nomenclaturize est a la base un outil de gestion des stocks avec une simple, entrée / sortie du stock. Est ensuite venu la possibilité de définir plusieurs zones de stockages. La gestion devient alors multi-inventaires.</p>

<p>Il est aussi possible de définir des images d'articles pour mieux représenter les article sdnas la base et rendre la compréhension pour l'utilisateur final plus rapide.</p>

<h4>Listes & assemblages</h4>

<p>
    Les machines de chez Metalizz sont conçues avec des sous-assemblages imbriqués, Nomenclaturize permet de définir les assembmlages et sous assemblages pour définir une Machine ou un objet fini.
</p>

<p>Ces assebmages peuvent ensuites être déclinés en listes d'achat ou de présence pour permettre a l'utilisateur de construire une machine et s'assurer de la présence de tout les articles</p>

<h4>Commandes</h4>

<p>
    Gérer les approvisionement c'est une des fonctionnalité de nomenclaturize, vous pouvez créer des commandes pour tout les articles de la base. 
    Il est aussi possible de générer directement des commandes depuis les manques dans une liste d'achat, cela permet d'éviter les erreurs de commandes.
</p>

<p>
    Utiliser Nomenclaturize pour gérer les commandes permet de garder un historique des commandes et d'avoir le <em>prix moyen unitaire pondéré (PUMP)</em> de chaque article.
</p>

<p class="mt-4 font-semibold text-lg">
    Nomenclaturize est un outil qui m'as permis d'améliorer la gestion des stocks et des commandes chez Metalizz, il est encore en développement et je compte bien l'améliorer encore.
    C'est un outil avec un fort potentiel et qui peut être utilisé dans d'autres contextes.
</p>

<p class="mt-4 font-semibold text-lg">
    Ce projet m'as permis de mieux comprendre les rouages de la gestion des stocks et des commandes au sein d'une entreprise.
</p>