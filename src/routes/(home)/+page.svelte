<script lang="ts">

    import Scene from "$lib/home/scene.svelte";
    import { techs } from "$lib/home/techs";
    import { Canvas } from "@threlte/core";

    import Section from "$lib/Section.svelte";
    import Experience from "$lib/experiences/experience.svelte";
    import Tech from "$lib/tech.svelte";
    import Sociallink from "$lib/sociallink.svelte";
    import Card from "$lib/projects/card.svelte";
    import ContactForm from "$lib/ContactForm.svelte";
    
</script>

<Section id="home" class="min-h-screen w-screen bg-transparent text-white flex flex-col justify-center relative">

    <div class="absolute inset-0 -z-10 bg-zinc-900" style:mask-image="linear-gradient(transparent, black)" style:background-image="url(./grid.svg)" />

    <div class="grid grid-cols-1 xl:grid-cols-3 2xl:grid-cols-2 justify-center h-full gap-8 zstack">
        <div class="cols-span-1 xl:col-span-2 2xl:col-span-1">
            <div class="flex flex-row justify-between gap-4">
                <div>
                    <h1 class="text-6xl lg:text-8xl mb-3 bg-gradient-to-r from-violet-600 via-indigo-700 to-pink-700 bg-clip-text text-transparent relative after:content-[''] after:block lg:after:bg-white after:h-4 lg:hover:after:w-96 after:absolute after:w-32 after:duration-200 after:-translate-x-6 after:translate-y-[-22px] lg:hover:after:translate-y-[-24px] after:-z-10">Romain SAPET</h1>
                    <p class="text-zinc-300 text-lg">Developpeur Web Full-Stack</p>
                </div>
                <img src="images/face.webp" alt="Romain SAPET" class="h-10 mt-6 xs:h-20 xs:mt-2 aspect-square rounded-full ring-2 ring-white hidden xs:inline xl:hidden" />
            </div>
    
            <h2 class="hidden xl:inline-block mt-12">Mes compétences</h2>
    
            <div class="flex flex-row flex-wrap gap-4 mt-8">
                {#each techs as tech, i}
                    <Tech {tech} skewWay={i % 2 === 0} />
                {/each}
            </div>
    
            <h2 class="hidden xl:inline-block mt-12">Liens</h2>
    
            <div class="flex flex-col flex-nowrap items-start gap-4 mt-8 lg:ml-2">
                <Sociallink href="https://github.com/kworz" icon="images/socials/github.svg" iconAlt="Logo Github">Consultez mes projets sur Github</Sociallink>
                <Sociallink href="https://www.linkedin.com/in/romain-sapet-7b70491a4/" icon="images/socials/linkedin.svg" iconAlt="Logo Linkedin">Connectons nous sur Linkedin!</Sociallink>
                <Sociallink href="/CV-Romain-SAPET.pdf" icon="images/socials/resume.svg" iconAlt="Pictograme CV">Télécharger mon CV</Sociallink>
                <Sociallink href="#contact" icon="images/socials/mail.svg" iconAlt="Pictograme mail">Me contacter par email</Sociallink>
            </div>
        </div>

        <div class="hidden xl:block">
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

        <a href="/projects/mink">
            <Card class="bg-gradient-to-br from-pink-700 to-violet-400" title="mink" desc="ERP / Web fullstack" textColor="text-white" />
        </a>

        <a href="/projects/eidos-coating">
            <Card image="url(projects/eidos-coating/logo.png)" class="bg-white" title="Eidos coating" desc="Site vitrine / Web front-end" />
        </a>

        <a href="/projects/cao-uscleaner">
            <Card image="url(projects/cao-uscleaner/uscleaner.webp" title="USCleaner" desc="CAO 3D / Conception et fabrication" textColor="text-white" />
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

        <Experience date={"Janvier 2020 — Janvier 2024"}>

            <svelte:fragment slot="lead">
                <a href="https://metalizz.com/"><h3>Metalizz</h3></a>
                <div class="h-1 aspect-square rounded-full bg-zinc-500" />
                <p>Responsable des études</p>
            </svelte:fragment>

            <p>
                Depuis 2020, j'ai migré l'automatisation des machine d'un système traditionel (FBD) vers une achitecture Edge computing basée sur BalenaOS et Docker.<br>
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

        <Experience date="Novembre 2023 — Aujourd'hui" last>

            <svelte:fragment slot="lead">
                <a href="https://metalizz.com/"><h3>Micro-entrepreneur</h3></a>
                <div class="h-1 aspect-square rounded-full bg-zinc-500" />
                <p>À mon compte</p>
            </svelte:fragment>

            <p>
                Fin 2023, j'ai décidé de me lancer en tant que micro-entrepreneur. 
                J'ai ainsi pu mettre à profit mes compétences dans plusieurs domaines pour diversifier mes activités.
            </p>

            <ul class="[&>*]:text-zinc-900">
                <li>Conception & Intégration de sites Web (from scratch ou Wordpress)</li>
                <li>Études techniques d'automatisme</li>
                <li>Conception 3D</li>
            </ul>

            <p>
                Je suis ouvert à toutes sortes de projets dans le monde du Web, de l'automatisme & de la conception 3D. <br>
                N'hésitez pas à me <a href="#contact">contacter</a> pour en discuter!
            </p>

        </Experience>

    </div>
</Section>

<ContactForm />

<style>

    @media (max-width: 768px) {
        .zstack > div {
            grid-area: 1 / 1 / 1 / 1;
        }
    }

</style>
