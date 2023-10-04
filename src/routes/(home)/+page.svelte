<script lang="ts">

    import Scene from "$lib/home/scene.svelte";
    import { techs } from "$lib/home/techs";
    import { Canvas } from "@threlte/core";
    import { fade } from "svelte/transition";

    import { ArrowDown } from "@steeze-ui/heroicons";
    import { Icon } from "@steeze-ui/svelte-icon";
    import { onMount } from "svelte";
    import Section from "$lib/Section.svelte";
    import Experience from "$lib/experiences/experience.svelte";
    import Tech from "$lib/tech.svelte";
    import Sociallink from "$lib/sociallink.svelte";

    let displayPill = false;

    let contact_subject = "";
    let contact_email = "";
    let contact_message = "";

    let formResponse: { success: boolean, message: string } | undefined = undefined; 

    onMount(() => {
        setTimeout(() => {
            displayPill = true;
        }, 2000);
    });

    const sendContactForm = async () => {

        const formdata = new FormData();
        formdata.append("sender", contact_email);
        formdata.append("subject", contact_subject);
        formdata.append("content", contact_message);

        const request = await fetch("mail.php",{ method: "POST", body: formdata});

        const response = await request.text();

        formResponse =  {
            success: request.ok && request.status === 200,
            message: response
        };
    }

    $: if(formResponse !== undefined) { setTimeout(() => { formResponse = undefined }, formResponse.success ? 5000 : 10000) }

</script>

<Section id="home" class="h-screen w-screen bg-zinc-900 text-white">

    <div class="grid md:grid-cols-2 h-full gap-8 zstack">

        <div>
            <h1 class="text-6xl mb-3">Romain SAPET</h1>
            <p class="text-zinc-300 text-lg">Developpeur Web Full-Stack</p>
    
            <h3 class="hidden lg:inline-block mt-12">Mes compétences</h3>
    
            <div class="flex flex-row gap-4 w-max mt-8">
                {#each techs as tech, i}
                    <Tech {tech} skewWay={i % 2 === 0} />
                {/each}
            </div>
    
            <h3 class="hidden lg:inline-block mt-12">Réseaux sociaux</h3>
    
            <div class="flex flex-row md:flex-col flex-nowrap items-center lg:items-start md:justify-around gap-4 mt-8 lg:ml-2">
    
                <Sociallink href="https://github.com/kworz" icon="images/socials/github.svg" iconAlt="Logo Github">Consultez mes projets sur Github</Sociallink>
                <Sociallink href="https://www.linkedin.com/in/romain-sapet-7b70491a4/" icon="images/socials/linkedin.svg" iconAlt="Logo Linkedin">Connectons nous sur Linkedin!</Sociallink>
                <Sociallink href="#contact" icon="images/socials/mail.svg" iconAlt="Pictograme mail">Me contacter par email</Sociallink>
    
            </div>
        </div>
        <div>
            <Canvas>
                <Scene />
            </Canvas>
        </div>
    </div>

    {#if displayPill}
        <button 
            class="hidden lg:block bg-white absolute bottom-16 left-1/2 -translate-x-1/2 rounded-full w-max pr-4 pl-2 py-1 text-zinc-700 animate-bounce transition-all duration-500" 
            in:fade={{ duration: 200 }}
            on:click={() => window.scrollTo({ top: window.innerHeight, behavior: "smooth" })}
        >
            <Icon src={ArrowDown} class="h-4 w-4 mb-0.5 inline" />
            Voir la suite!
        </button>
    {/if}

</Section>

<Section id="experience" class="bg-stone-100">

    <h2 class="mb-16 text-center">Mes expériences</h2>

    <div class="w-2/3 mx-auto flex flex-col gap-2">

        <Experience date={"Septembre 2017 — Aujourd'hui"}>

            <svelte:fragment slot="lead">
                <a href="https://metalizz.com/"><h3>Metalizz</h3></a>
                <div class="h-1 aspect-square rounded-full bg-zinc-500" />
                <p>Responsable des études</p>
            </svelte:fragment>

            <p>
                J'ai commencé ma carrière professionelle chez Metalizz. 
                Société spécialisée dans l'élaboration de post-traitement inovants et la conception, fabrication et vente de machine de post-traitement des pièces plastiques en tout genre.
            </p>
            <p>Mon rôle était de concevoir les machines pour adapter les procédés dans des machines. J'ai ainsi pu diversifier mes compétences dans plusieurs domaines</p>
            <ul class="[&>*]:text-zinc-900">
                <li>Conception mécanique</li>
                <li>Conception électrique</li>
                <li>Conception pneumatique</li>
                <li>Développement logiciel</li>
                <li>Intégration continue</li>
                <li>Gestion d'un parc de machines</li>
                <li>Service après-vente</li>
            </ul>
            <p>
                Depuis 2019, j'ai migré l'automatisation des machine d'un système traditionel (Graphcet) vers une achitecture Edge computing basée sur BalenaOS et Docker. Cette architecture bien que plus complexe a mettre en place, a l'avantage d'offrir une maintenabilité plus accrue!
                <a href="#projects">Voir plus de détails</a>
            </p>

        </Experience>

        <Experience date="Juin 2022 — Aujourd'hui" last>

            <svelte:fragment slot="lead">
                <a href="https://metalizz.com/"><h3>Wildcard records</h3></a>
                <div class="h-1 aspect-square rounded-full bg-zinc-500" />
                <p>CEO & Ingénieur du son</p>
            </svelte:fragment>

            <p>
                En 2019, je me retrouve a créer de la musique avec quelques amis, cela ne restera pas sérieux pour beaucoup mais avec quelques uns nous avons fait le pari de se lancer. C'est pourquoi depuis quelques années, j'occupe la place de l'homme de l'ombre derrière la naissante carrière de <a href="https://open.spotify.com/intl-fr/artist/6YZvEinSwiLu5iwQSZVqUE?si=vTOsFF3XQLmjzyUck3Pxgw">Campesino</a>.
            </p>
            <p>
                Mon rôle est de gérer la partie technique de la production musicale, du mixage au mastering en passant par la distribution. Les relations presse et la gestion des imprévus font aussi partie de mon quotidien.
            </p>
            <p>
                C'est une expérience enrichissante qui m'as permis de découvrir l'ingénieurie audio, l'industrie musicale, le monde de l'entrepreunariat et la gestion de projets.
            </p>
        </Experience>
    </div>
</Section>

<Section id="projects" class=" bg-zinc-200">

    <h2 class="text-center mb-2">Projets</h2>
    <p class="text-center">Consultez les différents projets auquels j'ai pris part.</p>

    <div class="w-2/3 mx-auto grid grid-cols-3 gap-8 mt-12">
        
        <a href="/projects/nuster-kit">
            <div class="h-48 p-4 rounded-xl object-contain text-zinc-900 hover:scale-[1.02] duration-200 ease-in-out shadow-md hover:shadow-xl" style:background-image={"url(projects/nuster-kit/nuster.png)"} style:background-size="cover" style:background-position="center">
                <div class="p-4 rounded-md backdrop-blur-md bg-white/25 text-zinc-900">
                    <h4>Nuster</h4>
                    <p>Metalizz — Software fullstack</p>
                </div>
            </div>
        </a>

        <a href="/projects/nomenclaturize">
            <div class="h-48 p-4 rounded-xl object-contain text-white hover:scale-[1.02] duration-200 ease-in-out shadow-md hover:shadow-xl bg-gradient-to-br from-pink-700 to-violet-400">
                <div class="p-4 rounded-md backdrop-blur-md bg-white/25 text-white">
                    <h4>Nomenclaturize</h4>
                    <p>Personnel — ERP / Software fullstack</p>
                </div>
            </div>
        </a>

        <a href="/projects/la-graine">
            <div class="h-48 p-4 rounded-xl object-contain text-white hover:scale-[1.02] duration-200 ease-in-out shadow-md hover:shadow-xl" style:background-image={"url(projects/la-graine/cover.jpeg)"} style:background-size="cover" style:background-position="center">
                <div class="p-4 rounded-md backdrop-blur-md bg-white/25 text-white">
                    <h4>La Graine</h4>
                    <p>Wildcard Record — Projet musical</p>
                </div>
            </div>
        </a>

    </div>

</Section>

<Section id="contact" class="bg-zinc-900 text-white">

    <div class="w-2/3 mx-auto">

        <h2 class="text-5xl">Me contacter</h2>

        <div class="flex flex-row gap-4 mt-6 mb-12">
            <span class="text-xl">Vous avez un projet ?</span>
            <span class="text-xl">Vous souhaitez me contacter ?</span>
            <span class="text-xl">Vous avez une question ?</span>
        </div>

        {#if formResponse !== undefined}
            <p 
                class="font-medium mb-8"
                class:text-red-400={!formResponse.success}
                class:text-emerald-400={formResponse.success}
                in:fade={{ duration: 200 }}
                out:fade={{ duration: 200 }}
            >
                {formResponse.message}
            </p>
        {/if}

        <form action="mail.php" method="post">
            <div class="grid grid-cols-2 gap-6">
                <input bind:value={contact_subject} type="text" placeholder="Sujet (5 caratères min.)" name="subject" class="p-4 rounded-md text-zinc-900" minlength={5} required />
                <input bind:value={contact_email} type="email" placeholder="Votre addresse mail" name="sender" class="p-4 rounded-md text-zinc-900" required />
            </div>
            <textarea bind:value={contact_message} name="message" placeholder="Votre message (50 caratères min.)" class="mt-6 w-full h-96 rounded-md p-4 text-zinc-900" minlength={50} required></textarea>
            <p class="mt-6">Tout les champs sont requis. Aucune donnée personnelle n’est conservée via ce formulaire.</p>
            <button type="button" class="bg-indigo-500 py-2 px-6 rounded-md mt-6" on:click|preventDefault={sendContactForm}>Envoyer</button>
        </form> 
    </div>

</Section>

<style>

    @media (max-width: 768px) {
        .zstack > div {
            grid-area: 1 / 1 / 1 / 1;
        }
    }

</style>
