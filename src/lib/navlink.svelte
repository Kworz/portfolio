<script lang="ts">

    export let href: string;
    export let sectionHeight: number;
    export let isLead: boolean;

</script>


<a 
    {href}
    style:--sec-height={sectionHeight + "%"}
    style:--is-lead={isLead ? "0" : "1"}
    class="text-white font-normal hover:text-zinc-300 duration-50 relative navlink"
>
    <slot />
</a>

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