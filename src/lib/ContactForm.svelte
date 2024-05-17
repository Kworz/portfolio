<script lang="ts">
    
    import { fade } from "svelte/transition";
    import Section from "./Section.svelte";

    let contact_subject = "";
    let contact_email = "";
    let contact_message = "";

    let formResponse: { success: boolean, message: string } | undefined = undefined; 

    const sendContactForm = async () => {

        const formdata = new FormData();
        formdata.append("sender", contact_email);
        formdata.append("subject", contact_subject);
        formdata.append("content", contact_message);

        const request = await fetch("mail.php",{ method: "POST", body: formdata });

        const response = await request.text();

        formResponse =  {
            success: request.ok && request.status === 200,
            message: response
        };
    }

    $: if(formResponse !== undefined && formResponse.success) { 
        // Clear form
        contact_email = "";
        contact_subject = "";
        contact_message = "";

        // display success message for 5 seconds
        setTimeout(() => { formResponse = undefined }, 5000);
    }

</script>

<Section id="contact" class="bg-zinc-900 text-white">

    <div class="w-auto md:w-4/5 lg:w-3/4 xl:w-2/3 mx-auto">

        <h2 class="text-5xl">Me contacter</h2>

        <div class="flex flex-col md:flex-row gap-2 md:gap-4 mt-6 mb-12">
            <span class="text-xl">Vous avez un projet ?</span>
            <span class="text-xl">Vous souhaitez me contacter ?</span>
            <span class="text-xl">Vous avez une question ?</span>
        </div>

        {#if formResponse !== undefined}
            <p 
                class="font-semibold mb-8"
                class:text-red-400={!formResponse.success}
                class:text-emerald-400={formResponse.success}
                in:fade={{ duration: 200 }}
                out:fade={{ duration: 200 }}
            >
                {formResponse.message}
            </p>
        {/if}

        <form action="mail.php" method="post">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <input bind:value={contact_subject} type="text" placeholder="Sujet (5 caratères min.)" name="subject" class="p-4 rounded-md text-zinc-900" minlength={5} required />
                <input bind:value={contact_email} type="email" placeholder="Votre addresse mail" name="sender" class="p-4 rounded-md text-zinc-900" required />
            </div>
            <textarea bind:value={contact_message} name="message" placeholder="Votre message (50 caratères min.)" class="mt-6 w-full h-96 rounded-md p-4 text-zinc-900" minlength={50} required></textarea>
            <p class="mt-6">Tout les champs sont requis. Aucune donnée personnelle n’est conservée via ce formulaire.</p>
            <p class="my-2">Si vous ne souhaitez pas utiliser le formulaire de contact, envoyez moi un email à l'adresse <a href="mailto:contact@hwxmca.fr">contact@zaapee.fr</a>.</p>
            <button type="button" class="bg-indigo-500 py-2 px-6 rounded-md mt-6" on:click|preventDefault={sendContactForm}>Envoyer</button>
        </form> 
    </div>

</Section>