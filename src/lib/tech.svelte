<script lang="ts">

    export let tech: { link :string, name: string, icon: string };
    export let skewWay = false;

</script>

<a href={tech.link}>
    <div class="rounded-md bg-white p-1 md:p-2 h-8 md:h-12 aspect-square duration-200 hover:scale-[1.05] {skewWay ? "hover:skew-x-1" : "hover:-skew-x-1"}">
        <img src={tech.icon} alt={tech.name} class="object-contain rounded-sm h-6 md:h-8" />
    </div>
</a>