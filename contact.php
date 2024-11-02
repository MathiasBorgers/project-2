<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $naam = htmlspecialchars(trim($_POST['naam']));
    $email = htmlspecialchars(trim($_POST['email']));
    $onderwerp = htmlspecialchars(trim($_POST['onderwerp']));
    $vraag = htmlspecialchars(trim($_POST['vraag']));
    $to = 'contact@mathiasborgers.be';
    $subject = "Nieuw contactformulier bericht: $onderwerp";
    $message = "
    Naam: $naam\n
    E-mailadres: $email\n
    Onderwerp: $onderwerp\n
    Bericht:\n $vraag
    ";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";
    if (mail($to, $subject, $message, $headers)) {
        echo "Bedankt voor je bericht! We nemen zo snel mogelijk contact met je op.";
    } else {
        echo "Er is iets misgegaan met het versturen van je bericht. Probeer het later opnieuw.";
    }
}
?>