<?php

    $sender = $_POST['sender'];
    $subject = $_POST['subject'];
    
    $content = $_POST['content'];

    if(filter_var($sender, FILTER_VALIDATE_EMAIL) === false)
    {
        echo "Merci d'entrer une adresse mail valide";
        http_response_code(400);
        die();
    }

    if(strlen($content) < 50)
    {
        echo "Merci de détailler votre demande";
        http_response_code(400);
        die();
    }

    if(strlen($subject) < 5) {
        echo "Le sujet doit contenir au moins 5 caractères";
        http_response_code(400);
        die();
    }

    $headers = array(
        'From' => $sender,
        'Reply-To' => $sender,
        'X-Mailer' => 'PHP/' . phpversion()
    );

    $message = "Début du message:\r\n\r\n" . wordwrap($content, 70, "\r\n");

    $sent = mail('contact@hwxmca.fr', "Formulaire contact:" . $subject, $message, $headers);

    if($sent !== true)
    {
        echo "Erreur lors de l'envoi du message";
        http_response_code(500);
        die();
    }

    echo "Votre message a bien été envoyé !";

?>