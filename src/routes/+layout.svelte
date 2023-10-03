<script lang="ts">
    import "$lib/app.css";
    import { section } from "$lib/section";
    import { onMount } from "svelte";

    let sectionsHeight = {
        home: 100,
        experience: 0,
        experience2: 0
    };

    const handleScroll = () => {

        const sections = Array.from(document.getElementsByTagName("section")) as Array<HTMLDivElement>;

        for(const s of sections)
        {
            const { height, bottom } = s.getBoundingClientRect();
            let sectionPerc = bottom / height;
            
            if(sectionPerc >= 2)
                sectionPerc = 0;
            else if(sectionPerc < 2 && sectionPerc > 1)
                sectionPerc = 1 - (sectionPerc % 1);
        
            sectionsHeight[s.id] = (sectionPerc * 100);
            
            if (sectionPerc > 0 && sectionPerc <= 1)
                $section = s.id;
        }
    }

    onMount(handleScroll);

</script>

<svelte:window on:scroll={handleScroll} />

<nav class="fixed right-8 top-8 flex flex-row gap-6 items-center text-white text rounded-full backdrop-blur-lg py-2 px-4 bg-zinc-900/50">
    <a href="#home" style="--sec-height: {sectionsHeight["home"]}%; --is-lead: {$section === "home" ? "0" : "1"}" class="hover:text-zinc-300 duration-100 relative navlink">Présentation</a>
    <div class="rounded-full h-1 w-1 bg-white"></div>
    <a href="#experience" style="--sec-height: {sectionsHeight["experience"]}%; --is-lead: {$section === "experience" ? "0" : "1"}" class="hover:text-zinc-300 duration-100 relative navlink">Experience</a>
    <div class="rounded-full h-1 w-1 bg-white"></div>
    <a href="#experience2" style="--sec-height: {sectionsHeight["experience2"]}%; --is-lead: {$section === "experience2" ? "0" : "1"}" class="hover:text-zinc-300 duration-100 relative navlink">Experience2</a>
</nav>

<slot />

<style>

    .navlink::before {
        content: "";
        display: block;
        background-color: white;
        margin-left: calc(var(--is-lead) * calc(100% - var(--sec-height)));
        height: 1px;
        width: var(--sec-height);
        position: absolute;
        bottom: 0px;
        left: 0;
        transition: ease-in-out;
        transition-duration: 50ms;
    }

</style>
