<script lang="ts">

    import Scene from "$lib/home/scene.svelte";
    import { techs } from "$lib/home/techs";
    import { Canvas } from "@threlte/core";
    import { fade } from "svelte/transition";

    import Section from "$lib/Section.svelte";
    import Experience from "$lib/experiences/experience.svelte";
    import Tech from "$lib/tech.svelte";
    import Sociallink from "$lib/sociallink.svelte";
    import Card from "$lib/projects/card.svelte";

    let contact_subject = "";
    let contact_email = "";
    let contact_message = "";

    let formResponse: { success: boolean, message: string } | undefined = undefined; 

    const sendContactForm = async () => {

        const formdata = new FormData();
        formdata.append("sender", contact_email);
        formdata.append("subject", contact_subject);
        formdata.append("content", contact_message);

        const request = await fetch("mail.php",{ method: "POST", body: formdata });

        const response = await request.text();

        formResponse =  {
            success: request.ok && request.status === 200,
            message: response
        };
    }

    $: if(formResponse !== undefined) { setTimeout(() => { formResponse = undefined }, formResponse.success ? 5000 : 10000) }

</script>

<Section id="home" class="min-h-screen w-screen bg-zinc-900 text-white relative">

    <div class="grid grid-cols-1 lg:grid-cols-2 h-full gap-8 zstack">
        <div>
            <div class="flex flex-row justify-between gap-4">
                <div>
                    <h1 class="text-6xl mb-3">Romain SAPET</h1>
                    <p class="text-zinc-300 text-lg">Developpeur Web Full-Stack</p>
                </div>
                <img src="images/face.webp" alt="Romain SAPET" class="h-10 mt-6 xs:h-20 xs:mt-2 aspect-square rounded-full ring-2 ring-white inline lg:hidden" />
            </div>
    
            <h2 class="hidden lg:inline-block mt-12">Mes compétences</h2>
    
            <div class="flex flex-row flex-wrap gap-4 mt-8">
                {#each techs as tech, i}
                    <Tech {tech} skewWay={i % 2 === 0} />
                {/each}
            </div>
    
            <h2 class="hidden lg:inline-block mt-12">Liens</h2>
    
            <div class="flex flex-col flex-nowrap items-start gap-4 mt-8 lg:ml-2">
                <Sociallink href="https://github.com/kworz" icon="images/socials/github.svg" iconAlt="Logo Github">Consultez mes projets sur Github</Sociallink>
                <Sociallink href="https://www.linkedin.com/in/romain-sapet-7b70491a4/" icon="images/socials/linkedin.svg" iconAlt="Logo Linkedin">Connectons nous sur Linkedin!</Sociallink>
                <Sociallink href="/CV-Romain-SAPET.pdf" icon="images/socials/resume.svg" iconAlt="Pictograme CV">Télécharger mon CV</Sociallink>
                <Sociallink href="#contact" icon="images/socials/mail.svg" iconAlt="Pictograme mail">Me contacter par email</Sociallink>
            </div>
        </div>

        <div class="hidden lg:block">
            <Canvas>
                <Scene />
            </Canvas>
        </div>
    </div>
</Section>

<Section id="projects" class=" bg-zinc-200">
    <h2 class="text-center mb-2">Projets</h2>
    <p class="text-center">Consultez les différents projets auquels j'ai pris part.</p>

    <div class="w-auto md:w-4/5 lg:w-3/4 xl:w-2/3 mx-auto grid grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 gap-8 mt-12">
        <a href="/projects/nuster-kit">
            <Card image="url(projects/nuster-kit/nuster.png)" title="Nuster" desc="Microservices / Fullstack" />
        </a>

        <a href="/projects/nomenclaturize">
            <Card class="bg-gradient-to-br from-pink-700 to-violet-400" title="Nomenclaturize" desc="ERP / Web fullstack" textColor="text-white" />
        </a>

        <a href="/projects/cao-uscleaner">
            <Card image="url(projects/cao-uscleaner/uscleaner.webp" title="USCleaner" desc="CAO 3D / Conception et fabrication" textColor="text-white" />
        </a>

        <a href="/projects/zoo-upie">
            <Card image="" title="Zoo Upie" desc="Maquettage / Application web" textColor="text-white" />
        </a>

        <a href="/projects/la-graine">
            <Card image="url(projects/la-graine/cover.jpeg)" title="La Graine" desc="Projet musical" textColor="text-white" />
        </a>
    </div>
</Section>

<Section id="experience" class="bg-stone-100">
    <h2 class="mb-16 text-center">Mes expériences</h2>
    <div class="w-auto md:w-4/5 lg:w-3/4 xl:w-2/3 mx-auto flex flex-col gap-2">

        <Experience date={"Septembre 2017 — Janvier 2020"}>

            <svelte:fragment slot="lead">
                <a href="https://metalizz.com/"><h3>Metalizz</h3></a>
                <div class="h-1 aspect-square rounded-full bg-zinc-500" />
                <p>Conception machines</p>
            </svelte:fragment>

            <p>
                J'ai commencé ma carrière professionelle chez Metalizz. 
                Société spécialisée dans l'élaboration de solutions innovantes de post-traitement et la conception, fabrication et vente de machine de post-traitement des pièces plastiques en tout genre.
            </p>
            <p>Mon rôle était de concevoir les machines pour adapter les procédés dans des machines. J'ai ainsi pu diversifier mes compétences dans plusieurs domaines</p>

            <ul class="[&>*]:text-zinc-900">
                <li>Conception mécanique 3D</li>
                <li>Conception électrique</li>
                <li>Conception pneumatique</li>
                <li>Programmation FBD Automate</li>
                <li>Maintenance</li>
            </ul>

        </Experience>

        <Experience date={"Janvier 2020 — Maintenant"} last>

            <svelte:fragment slot="lead">
                <a href="https://metalizz.com/"><h3>Metalizz</h3></a>
                <div class="h-1 aspect-square rounded-full bg-zinc-500" />
                <p>Responsable des études</p>
            </svelte:fragment>

            <p>
                Depuis 2020, j'ai migré l'automatisation des machine d'un système traditionel (FBD) vers une achitecture Edge computing basée sur BalenaOS et Docker.
                Cette architecture bien que plus complexe à mettre en place, a l'avantage d'offrir une maintenabilité plus accrue!
            </p>

            <p>J'ai ainsi pu améliorer mes compténces dans les dommaines suivants:</p>

            <ul class="[&>*]:text-zinc-900">
                <li>Développement back-end (NodeJS)</li>
                <li>Développement front-end (Svelte)</li>
                <li>DevOps (Github Actions)</li>
                <li>Gestion parc de machines (Docker, BalenaOS & balenaCloud)</li>
            </ul>

            <p>
                Pour en savoir plus: <a href="/projects/nuster-kit">projet Nuster</a>.
            </p>

        </Experience>

    </div>
</Section>

<Section id="contact" class="bg-zinc-900 text-white">

    <div class="w-auto md:w-4/5 lg:w-3/4 xl:w-2/3 mx-auto">

        <h2 class="text-5xl">Me contacter</h2>

        <div class="flex flex-col md:flex-row gap-2 md:gap-4 mt-6 mb-12">
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
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
