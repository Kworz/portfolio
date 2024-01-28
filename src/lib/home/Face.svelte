<script lang="ts">
    import { T, useFrame } from '@threlte/core';
    import { interactivity, useGltf, useSuspense } from "@threlte/extras";
    import { quadOut } from 'svelte/easing';
    import { spring, tweened } from 'svelte/motion';
    import { Vector3, type Mesh } from 'three';
    
    import fragment from "./fragment.glsl?raw";
    import vertex from "./vertex.glsl?raw";

    interactivity();

    const suspend = useSuspense();

    let faceMesh: Mesh | undefined = undefined;
    let model = suspend(useGltf('/3d/face.glb', { useDraco: true }));

    const rotationX = spring(0);
    const rotationY = spring(0);
    const opacity = spring(0);
    const scale = spring(0);

    const pulsePosition = new Vector3();
    const pulseTimer = tweened(0, {
        easing: quadOut
    });

    useFrame(() => {
        rotationX.set(Math.sin((performance.now() / 1000)) * 0.01);
        rotationX.set(Math.cos((performance.now() / 1000)) * 0.015);
        scale.set(Math.sin((performance.now() / 1000)) * 0.001 + 0.2);
    });

    $: if($model !== undefined) { scale.set(0.4); opacity.set(1); };

</script>

{#await model then { nodes }}
    <T.Mesh 
        bind:ref={faceMesh} 
        geometry={nodes.mesh_0.geometry} 
        scale={$scale} 
        scale.y={0.37} 
        rotation.x={0.05} 
        rotation.y={$rotationX} 
        rotation.z={$rotationY} 
        position={[0, 6, 7]}
        on:click={({ point }) => {
            pulsePosition.set(point.x, point.y, point.z);
            pulseTimer.set(0, { duration: 0 });
            pulseTimer.set(1, { duration: 3000 });
        }}
    >
        <T.ShaderMaterial
            fragmentShader={fragment}
            vertexShader={vertex}
            uniforms={{
                pulseTimer: { value: 0 },
                pulsePosition: { value: pulsePosition }
            }}
            uniforms.pulseTimer.value={$pulseTimer}
        />
    </T.Mesh>
{/await}