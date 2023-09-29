<script lang="ts">
    import { T, useFrame } from '@threlte/core';
    import { interactivity, useGltf } from '@threlte/extras';
    import { spring, tweened } from 'svelte/motion';
    import { Vector3, type Mesh } from 'three';

    import fragment from "./fragment.glsl?raw";
    import vertex from "./vertex.glsl?raw";
    import { quadOut } from 'svelte/easing';

    interactivity();

    let model = useGltf('/3d/face.glb', { useDraco: true });

    let faceMesh: Mesh | undefined = undefined;

    const rotationX = spring(0);
    const rotationY = spring(0);
    const scale = spring(0);
    const opacity = spring(0);

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

<T.PerspectiveCamera makeDefault fov={40} aspect={2} near={0.1} position={[0, 8, 20]} far={300} on:create={({ ref }) => { ref.lookAt(0, 6, 3.5);}}>
</T.PerspectiveCamera>

<T.AmbientLight color="white" />
<T.DirectionalLight color="beige" position={[0, 10, 20]} />
<T.DirectionalLight color="white" position={[0, 20, 0]} />

{#if $model}
    <T.Mesh 
        bind:ref={faceMesh} 
        geometry={$model.nodes.mesh_0.geometry} 
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
{/if}
