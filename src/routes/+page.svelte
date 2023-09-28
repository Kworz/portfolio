<script lang="ts">

    import Scene from "$lib/home/scene.svelte";
    import { techs } from "$lib/home/techs";
    import { Canvas } from "@threlte/core";
    import { fade } from "svelte/transition";

    import { ArrowDown } from "@steeze-ui/heroicons";
    import { Icon } from "@steeze-ui/svelte-icon";
    import { onMount } from "svelte";

    let displayPill = false;

    onMount(() => {
        setTimeout(() => {
            displayPill = true;
        }, 2000);
    })

</script>

<section id="home" class="h-screen w-full bg-zinc-900 text-white">

    <div class="absolute right-12 top-12 bottom-12 w-1/2">
        <Canvas>
            <Scene />
        </Canvas>
    </div>

    <div class="mt-24 ml-24 p-8 duration-100 group inline-block">
        <h1 class="text-6xl mb-3">Romain SAPET</h1>
        <p class="text-zinc-300 text-lg">Developpeur Web Full-Stack</p>

        <h3 class="mt-12">Mes compétences</h3>

        <div class="grid grid-cols-5 gap-4 w-max mt-4">
            {#each techs as tech, i}
                <a href={tech.link}>
                    <div class="rounded-md bg-white p-2 h-12 w-12 duration-200 hover:scale-[1.05] {i % 2 ? "hover:skew-x-2" : "-skew-x-2"}">
                        <img src={tech.icon} alt={tech.name} class="object-contain rounded-sm h-8" />
                    </div>
                </a>
            {/each}
        </div>

        <h3 class="mt-16">Réseaux sociaux</h3>

        <div class="flex flex-col gap-4 mt-4 ml-2">

            <a href="https://github.com/kworz">
                <img src="images/socials/github.svg" class="h-8 inline mr-2 bg-white p-0.5 rounded-full hover:rotate-2 duration-500" alt="Logo Github"/>
                Consultez mes projets sur Github
            </a>

            <a href="https://www.linkedin.com/in/romain-sapet-7b70491a4/">
                <img src="images/socials/linkedin.svg" class="h-8 inline mr-2 bg-white p-0.5 rounded-full hover:-rotate-2 duration-500" alt="Logo Linkedin"/>
                Connectons nous sur Linkedin!
            </a>

            <a href="mailto:contact@hwxmca.fr">
                <img src="images/socials/mail.svg" class="h-8 inline mr-2 bg-white p-1 rounded-full hover:rotate-2 duration-500" alt="Pictograme Mail"/>
                Me contacter par e-mail
            </a>

        </div>
    </div>

    {#if displayPill}
        <button 
            class="bg-white absolute bottom-16 left-1/2 -translate-x-1/2 rounded-full w-max pr-4 pl-2 py-1 text-zinc-700 animate-bounce transition-all duration-500" 
            in:fade={{ duration: 200 }}
            on:click={() => window.scrollTo({ top: window.innerHeight, behavior: "smooth" })}
        >
            <Icon src={ArrowDown} class="h-4 w-4 mb-0.5 inline" />
            Voir la suite!
        </button>
    {/if}

</section>

<section class="h-screen bg-red-500">


</section>

