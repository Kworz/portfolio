<script lang="ts">
    import { T, useFrame } from '@threlte/core';
    import { OrbitControls, interactivity, useGltf } from '@threlte/extras';
    import { spring } from 'svelte/motion';
    import type { CircleGeometry, DirectionalLight, Mesh } from 'three';

    interactivity();

    let model = useGltf('/3d/face.gltf');

    let faceMesh: Mesh | undefined = undefined;

    const rotationX = spring(0);
    const rotationY = spring(0);
    const scale = spring(0);
    const opacity = spring(0);

    useFrame(() => {
        rotationX.set(Math.sin((performance.now() / 1000)) * 0.01);
        rotationX.set(Math.cos((performance.now() / 1000)) * 0.015);
        scale.set(Math.sin((performance.now() / 1000)) * 0.001 + 0.2);
    });

    $: if($model !== undefined) { scale.set(0.2); opacity.set(1); };

</script>

<T.PerspectiveCamera makeDefault fov={50} aspect={2} near={0.1} position={[0, 4, 20]} far={300} on:create={({ ref }) => { ref.lookAt(0, 3, 3.5);}}>
</T.PerspectiveCamera>

<T.AmbientLight color="white" />
<T.DirectionalLight color="beige" position={[0, 10, 20]} castShadow />
<T.DirectionalLight color="white" position={[0, 20, 0]} castShadow />

{#if $model}
    <T.Mesh 
        bind:ref={faceMesh} 
        geometry={$model.nodes.mesh_0.geometry} 
        receiveShadow castShadow 
        scale={$scale} 
        scale.y={0.19} 
        rotation.x={0.05} 
        rotation.y={$rotationX} 
        rotation.z={$rotationY} 
        position={[0, 6, 7]}
    >
        <T.MeshStandardMaterial color="white" metalness={0.1} roughness={0.5} emissive="beige" emissiveIntensity={0.2} opacity={$opacity} />
    </T.Mesh>
{/if}

<T.Mesh position.y={-1} receiveShadow>
    <T.CylinderGeometry args={[6, 6, 0.25, 128, 128]} />
    <T.MeshStandardMaterial color="white" />
</T.Mesh>

