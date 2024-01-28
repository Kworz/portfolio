<script lang="ts">
    import "$lib/app.css";
    import Navlink from "$lib/navlink.svelte";
    import LoadIndicator from "$lib/LoadIndicator.svelte";
    import Bars from "$lib/bars.svelte";
    import { fade } from "svelte/transition";
    import { page } from "$app/stores";

    let expandSmallMenu = false;

    $: $page.url, expandSmallMenu = false;
</script>

<LoadIndicator />

<nav class="z-10 flex md:hidden fixed top-0 right-0 left-0 py-2 px-5 bg-white border-b-[1px] border-zinc-300/75 flex-col gap-2">

    <button class="flex gap-4 items-center" on:click={() => expandSmallMenu = !expandSmallMenu}>
        <Bars />
        <span class="font-semibold uppercase">Menu</span>
    </button>

    {#if expandSmallMenu}
        <div class="flex flex-col gap-2 duration-100" in:fade out:fade>   
            <a href="#home">Présentation</a>
            <a href="#projects">Projets</a>
            <a href="#experience">Experience</a>
            <a href="#contact">Contact</a>
        </div>
    {/if}

</nav>

<nav class="z-10 hidden md:flex fixed right-8 top-8 flex-row gap-4 items-center text-white text rounded-full backdrop-blur-lg duration-100 py-2 px-5 bg-zinc-900/50">
    <div class="scrollmask" />
    <Navlink href="#home">Présentation</Navlink>
    <div class="rounded-full h-1 w-1 bg-white"></div>
    <Navlink href="#projects">Projets</Navlink>
    <div class="rounded-full h-1 w-1 bg-white"></div>
    <Navlink href="#experience">Experience</Navlink>
    <div class="rounded-full h-1 w-1 bg-white"></div>
    <Navlink href="#contact">Contact</Navlink>
</nav>

<slot />

<style lang="postcss">
    @media (prefers-reduced-motion: no-preference) {
        .scrollmask {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            z-index: 50;
            transition: opacity 0.2s ease-out;
            animation: scrollmask 100ms linear;
            animation-timeline: scroll();
            transform-origin: left;
            @apply backdrop-invert rounded-full overflow-hidden;
        }

        @keyframes scrollmask {
            from { transform: scaleX(0); }
            to { transform: scaleX(1); }
        } 
    }
</style>