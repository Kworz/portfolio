<script>
    import "$lib/app.css";
    import { PUBLIC_PUBLISH_DATE } from "$env/static/public";
</script>

<slot />

<footer class="bg-zinc-700 py-2 text-center">
    <p class="text-white">
        Dernière mise à jour: 
        <span class="font-semibold">{PUBLIC_PUBLISH_DATE}</span>
    </p>
</footer>