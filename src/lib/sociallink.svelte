<script lang="ts">
    export let href: string;
    export let icon: string;
    export let iconAlt: string;
</script>

<a {href}>
    <img src={icon} class="h-8 inline mr-4 bg-white p-1 rounded-lg hover:rotate-2 duration-500" alt={iconAlt}/>
    <span class="hidden md:inline text-white hover:text-zinc-200 duration-100"><slot /></span>
</a>