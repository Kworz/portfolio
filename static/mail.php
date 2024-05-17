<?php

    header('Content-Type: text/html; charset=utf-8');

    $sender = $_POST['sender'];
    $subject = $_POST['subject'];
    
    $content = $_POST['content'];

    if(filter_var($sender, FILTER_VALIDATE_EMAIL) === false)
    {
        http_response_code(400);
        echo "Merci d'entrer une adresse mail valide";
        die();
    }

    if(strlen($content) < 50)
    {
        http_response_code(400);
        echo "Merci de détailler votre demande";
        die();
    }

    if(strlen($subject) < 5) {
        http_response_code(400);
        echo "Le sujet doit contenir au moins 5 caractères";
        die();
    }

    $headers = array(
        'From' => $sender,
        'Reply-To' => $sender,
        'X-Mailer' => 'PHP/' . phpversion(),
        'Content-type' => 'text/plain; charset=utf-8',
    );

    $message = "Début du message:\r\n" . $content;

    $sent = mail('contact@zaapee.fr', "Formulaire contact:" . $subject, $message, $headers);

    if($sent !== true)
    {
        http_response_code(500);
        echo "Erreur lors de l'envoi du message";
        die();
    }

    echo "Votre message a bien été envoyé !";

?>