<?php

    $sender = $_POST['sender'];
    $subject = $_POST['subject'];
    
    $content = $_POST['content'];

    if(!filter_var($email_a, FILTER_VALIDATE_EMAIL))
    {
        echo "Merci d'entrer une adresse mail valide";
        http_response_code(400);
        exit();
    }

    if(strlen($content) < 50)
    {
        echo "Merci de détailler votre demande";
        http_response_code(400);
        exit();
    }

    if(strlen($subject) < 5) {
        echo "Le sujet doit contenir au moins 5 caractères";
        http_response_code(400);
        exit();
    }

    $headers = array(
        'From' => $sender,
        'Reply-To' => $sender,
        'X-Mailer' => 'PHP/' . phpversion()
    );

    $message = wordwrap($content, 70, "\r\n");

    $sent = mail('contact@hwxmca.fr', $subject, $message, $headers);

    if($sent === false)
    {
        echo "Erreur lors de l'envoi du message";
        http_response_code(500);
        exit();
    }

    echo "Votre message a bien été envoyé !";

?>