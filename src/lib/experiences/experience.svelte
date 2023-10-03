<div class="flex gap-8">
    <div class="flex gap-4 flex-col items-center">
        <div class="h-4 mt-2 aspect-square bg-indigo-500 rounded-full" />
        <div class="w-[2px] mx-auto bg-indigo-300 grow"/>
    </div>
    <div>
        <div class="flex gap-4 align-middle items-center">
            <slot name="lead" />
        </div>
        <span class="text-zinc-600 my-2 inline-block">{$$props.date}</span>
        <slot />
    </div>
</div>