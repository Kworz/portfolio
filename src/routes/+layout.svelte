<script>
    import "$lib/app.css";
    import { PUBLIC_PUBLISH_DATE, PUBLIC_COMMIT_ID } from "$env/static/public";
</script>

<slot />

<footer class="bg-zinc-700 py-2 text-center">
    <p class="text-white">
        Dernière mise à jour: 
        <a href="https://github.com/Kworz/portfolio/tree/{PUBLIC_COMMIT_ID}">{PUBLIC_PUBLISH_DATE}</a>
    </p>
</footer>