<script lang="ts">

    import Scene from "$lib/home/scene.svelte";
    import { techs } from "$lib/home/techs";
    import { Canvas } from "@threlte/core";
    import { fade } from "svelte/transition";

    import { ArrowDown } from "@steeze-ui/heroicons";
    import { Icon } from "@steeze-ui/svelte-icon";
    import { onMount } from "svelte";
    import Section from "$lib/Section.svelte";

    let displayPill = false;

    onMount(() => {
        setTimeout(() => {
            displayPill = true;
        }, 5000);
    });

</script>

<Section id="home" class="h-screen w-screen bg-zinc-900 text-white">

    <div class="grid md:grid-cols-2 h-full gap-8 zstack">

        <div>
            <h1 class="text-6xl mb-3">Romain SAPET</h1>
            <p class="text-zinc-300 text-lg">Developpeur Web Full-Stack</p>
    
            <h3 class="hidden lg:inline-block mt-12">Mes compétences</h3>
    
            <div class="flex flex-row gap-4 w-max mt-8">
                {#each techs as tech, i}
                    <a href={tech.link}>
                        <div class="rounded-md bg-white p-1 md:p-2 h-8 md:h-12 aspect-square duration-200 hover:scale-[1.05] {i % 2 ? "hover:skew-x-1" : "hover:-skew-x-1"}">
                            <img src={tech.icon} alt={tech.name} class="object-contain rounded-sm h-6 md:h-8" />
                        </div>
                    </a>
                {/each}
            </div>
    
            <h3 class="hidden lg:inline-block mt-12">Réseaux sociaux</h3>
    
            <div class="flex flex-row md:flex-col flex-nowrap items-center lg:items-start md:justify-around gap-4 mt-8 lg:ml-2">
    
                <a href="https://github.com/kworz">
                    <img src="images/socials/github.svg" class="h-8 inline mr-2 bg-white p-0.5 rounded-lg hover:rotate-2 duration-500" alt="Logo Github"/>
                    <span class="hidden md:inline hover:text-zinc-200 duration-100 text-lg">Consultez mes projets sur Github</span>
                </a>
    
                <a href="https://www.linkedin.com/in/romain-sapet-7b70491a4/">
                    <img src="images/socials/linkedin.svg" class="h-8 inline mr-2 bg-white p-0.5 rounded-lg hover:-rotate-2 duration-500" alt="Logo Linkedin"/>
                    <span class="hidden md:inline hover:text-zinc-200 duration-100 text-lg">Connectons nous sur Linkedin!</span>
                </a>
    
                <a href="mailto:contact@hwxmca.fr">
                    <img src="images/socials/mail.svg" class="h-8 inline mr-2 bg-white p-1 rounded-lg hover:rotate-2 duration-500" alt="Pictograme Mail"/>
                    <span class="hidden md:inline hover:text-zinc-200 duration-100 text-lg">Me contacter par e-mail</span>
                </a>
    
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

<Section id="experience" class="">

    test

</Section>

<Section id="experience2" class="h-screen bg-red-500">

    test2

</Section>

<style>

    @media (max-width: 768px) {
        .zstack > div {
            grid-area: 1 / 1 / 1 / 1;
        }
    }

</style>
