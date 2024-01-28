<script lang="ts">
    import { T } from '@threlte/core';
    import { Text, Suspense } from '@threlte/extras';
    import Face from './Face.svelte';

    const computeFov = () => {
        if(window.innerWidth < 768)
            // as the innerWidth decreases, increase the fov
            return 40 + (768 - window.innerWidth) / 20;
        else
            return 40;
    }

    let fov = computeFov();

</script>

<svelte:window on:resize={() => fov = computeFov()} />

<T.PerspectiveCamera makeDefault {fov} aspect={2} near={0.1} position={[0, 8, 20]} far={500} on:create={({ ref }) => { ref.lookAt(0, 6, 3.5);}}>
</T.PerspectiveCamera>

<T.AmbientLight />
<T.DirectionalLight position={[0, 10, 20]} />
<T.DirectionalLight position={[0, 20, 0]} />

<Suspense final>
    <Text
        position={[0, 2, 0]}
        slot="fallback"
        text="CHARGEMENT..."
        characters="ABCDEFGHIJKLMNOPQRSTUVWXYZ"
        fontSize={0.5}
        color="white"
    />
    <Face />
</Suspense>
