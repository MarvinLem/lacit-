<?php
$destination = "marvin.lemarchand@student.hepl.be";
$message_send = "Votre message a bien été envoyé";
$message_not_send = "Une erreur s'est produise votre message n'a pas été envoyé";
$error = "Certains champs n'ont pas été completés";

if (!isset($_POST['envoi']))
{
    //formulaire non envoyé
    echo '<p>'.$error.'</p>'."\n";
}
else {

    function rec($text)
    {
        $text = htmlspecialchars(trim($text), ENT_QUOTES);
        if (1 === get_magic_quotes_gpc()) {
            $text = stripslashes($text);
        }

        $text = nl2br($text);
        return $text;
    }

    ;

    function isEmail($email)
    {
        $value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
        return (($value === 0) || ($value === false)) ? false : true;
    }

    $nom = (isset($_POST['nom'])) ? rec($_POST['nom']) : '';
    $email = (isset($_POST['email'])) ? rec($_POST['email']) : '';
    $request = (isset($_POST['request'])) ? rec($_POST['request']) : '';
    $message = (isset($_POST['message'])) ? rec($_POST['message']) : '';

    $email = (isEmail($email)) ? $email : '';

    if (($nom != '') && ($email != '') && ($message != '') && ($request != '')) {
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From:' . $nom . ' <' . $email . '>' . "\r\n" .
            'Reply-To:' . $email . "\r\n" .
            'Content-Transfer-Encoding: 7bit' . " \r\n" .
            'X-Mailer:PHP/' . phpversion();

        $message = str_replace("&#039;", "'", $message);
        $message = str_replace("&#8217;", "'", $message);
        $message = str_replace("&quot;", '"', $message);
        $message = str_replace('<br>', '', $message);
        $message = str_replace('<br />', '', $message);
        $message = str_replace("&lt;", "<", $message);
        $message = str_replace("&gt;", ">", $message);
        $message = str_replace("&amp;", "&", $message);

        $cible = $destination;

        $num_emails = 0;
        $tmp = explode(';', $cible);
        foreach ($tmp as $email_destinataire) {
            if (mail($email_destinataire, $request, $message, $headers))
                $num_emails++;
        }

        echo '<p>' . $message_send . '</p>';

    } else {

        echo '<p>' . $message_not_send . '</p>';

    };
}
header('Location: http://localhost/LaCite/contact/');
?>