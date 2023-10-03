<script lang="ts">
    import "$lib/app.css";
    import Navlink from "$lib/navlink.svelte";
    import { section } from "$lib/section";
    import { onMount } from "svelte";

    let sectionsHeight = {
        home: 100,
        experience: 0,
        projects: 0,
        contact: 0
    };

    const handleScroll = () => {

        const sections = Array.from(document.getElementsByTagName("section")) as Array<HTMLDivElement & { id: "home" | "experience" | "projects" | "contact"}>;

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

<nav class="fixed right-8 top-8 flex flex-row gap-4 items-center text-white text rounded-full backdrop-blur-lg py-2 px-5 bg-zinc-900/50">
    <Navlink href="#home" sectionHeight={sectionsHeight["home"]} isLead={$section === "home"}>Présentation</Navlink>
    <div class="rounded-full h-1 w-1 bg-white"></div>
    <Navlink href="#experience" sectionHeight={sectionsHeight["experience"]} isLead={$section === "experience"}>Experience</Navlink>
    <div class="rounded-full h-1 w-1 bg-white"></div>
    <Navlink href="#projects" sectionHeight={sectionsHeight["projects"]} isLead={$section === "projects"}>Projets</Navlink>
    <div class="rounded-full h-1 w-1 bg-white"></div>
    <Navlink href="#contact" sectionHeight={sectionsHeight["contact"]} isLead={$section === "contact"}>Contact</Navlink>
</nav>

<slot />
