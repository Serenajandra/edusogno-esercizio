<?php
session_start();
ini_set("SMTP", "sandbox.smtp.mailtrap.io");
ini_set("smtp_port", "25");
ini_set('username', '455ab7df3b8dd9');
ini_set('password', '48b64f884342e3');
ini_set('smtp_ssl', 'tls');


if (isset($_POST['send_email'])) {
    // invia l'email all'indirizzo dell'utente loggato
    $to = $_POST["email"];
    $subject = 'Oggetto della mail';
    $message = 'Per modificare la tua password clicca su questo link: <a href="../change-password">Cambia password</a>';
    $headers = 'From: mittente@example.com' . "\r\n" . 'Reply-To: mittente@example.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
}

var_dump($to, $subject, $message, $headers);

if (mail($to, $subject, $message, $headers)) {
    echo "Abbiamo inviato una e-mail alla casella di posta con cui ti sei registrato";
} else {
    echo "Errore ricarica la pagina e riprova";
}
