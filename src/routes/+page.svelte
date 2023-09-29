<script lang="ts">

    import Scene from "$lib/home/scene.svelte";
    import { techs } from "$lib/home/techs";
    import { Canvas } from "@threlte/core";
    import { crossfade, fade } from "svelte/transition";

    import { ArrowDown } from "@steeze-ui/heroicons";
    import { Icon } from "@steeze-ui/svelte-icon";
    import { onMount } from "svelte";

    let displayPill = false;

    let selectedTech: typeof techs[number] | undefined = undefined;

    onMount(() => {
        setTimeout(() => {
            displayPill = true;
        }, 5000);
    })

</script>

<section id="home" class="h-screen w-screen p-8 sm:p-12 md:p-16 lg:p-24 xl:p-32 bg-zinc-900 text-white">

    <div class="grid grid-cols-2 h-full gap-8">

        <div>
            <h1 class="text-6xl mb-3">Romain SAPET</h1>
            <p class="text-zinc-300 text-lg">Developpeur Web Full-Stack</p>
    
            <h3 class="hidden lg:inline-block mt-12">Mes compétences</h3>
    
            <div class="flex flex-row gap-4 w-max mt-8">
                {#each techs as tech, i}
                    <button on:click={() => selectedTech = (selectedTech !== tech) ? tech : undefined}>
                        <div class="rounded-md bg-white p-1 md:p-2 h-8 md:h-12 aspect-square duration-200 hover:scale-[1.05] {i % 2 ? "hover:skew-x-1" : "hover:-skew-x-1"}">
                            <img src={tech.icon} alt={tech.name} class="object-contain rounded-sm h-6 md:h-8" />
                        </div>
                    </button>
                {/each}
            </div>

            {#if selectedTech !== undefined}
                <div in:fade out:fade class="p-4 mt-6 rounded-lg bg-zinc-700 backdrop-blur-md">
                    <div class="flex flex-row gap-4 items-center">
                        <img src={selectedTech.icon} class="rounded-md bg-white p-1 md:p-2 h-8 md:h-12 aspect-square object-contain" alt={selectedTech.name}/>
                        <a href={selectedTech.link}><h3>{selectedTech.name}</h3></a>
                    </div>
                    <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, quasi. Maxime doloribus at dolorum numquam rem fugit totam error, accusantium, inventore rerum ratione minus molestias iste accusamus iure tenetur! Atque?</p>
                </div>
            {/if}
    
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

</section>
