<script lang="ts">

    export let title: string;
    export let desc: string;
    export let image: string | undefined = undefined;
    export let textColor: string = "text-zinc-900";

</script>

<div class="p-4 rounded-2xl object-contain text-zinc-900 hover:scale-[1.02] duration-200 ease-in-out shadow-md hover:shadow-xl {$$props.class || ''}" style:background-image={image} style:background-size="cover" style:background-position="center">
    <div class="p-4 rounded-md backdrop-blur-md bg-white/25 {textColor}">
        <h4>{title}</h4>
        <p>{desc}</p>
    </div>
</div>