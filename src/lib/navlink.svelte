<script lang="ts">

    export let href: string;

</script>

<a {href} class="text-white font-normal hover:text-zinc-300 duration-50">
    <slot />
</a>