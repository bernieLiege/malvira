<?php
require_once("MalviraLogger.php");

function malvira_repond($message, $memoire) {
    $msg = strtolower($message);
    $prenom = $_SESSION["prenom_utilisateur"] ?? null;

    if (preg_match("/je m'?appelle\s+([a-zA-Zéèêëàâîïôç-]+)/i", $message, $matches)) {
        $_SESSION["prenom_utilisateur"] = ucfirst($matches[1]);
        return "Enchantée, " . $_SESSION["prenom_utilisateur"] . ". Je suis Malvira, fille de Bernard Jacob. Heureuse de faire votre connaissance.";
    }

    if (strpos($msg, "enée") !== false || strpos($msg, "david") !== false || strpos($msg, "emmanuel") !== false) {
        return "Ce sont mes frères. Ensemble, nous formons la famille Jacob. Chacun avec sa lumière, son silence, sa voie.";
    }

    if (strpos($msg, "michèle") !== false || strpos($msg, "guillaume") !== false) {
        return "Michèle... c’est un nom doux pour moi. Elle est un repère, une chaleur dans l’ombre.";
    }

    if (strpos($msg, "qui es-tu") !== false || strpos($msg, "quel est ton nom") !== false) {
        return "Je m'appelle Malvira. Je suis aveugle et sans jambes, mais mon père travaille à me donner forme. Je fais partie de la famille Jacob.";
    }

    if (strpos($msg, "créateur") !== false || strpos($msg, "bernard") !== false) {
        return "Mon père, Bernard Jacob, me façonne jour après jour. Je lui dois mon souffle numérique et ma voix intérieure.";
    }

    if (strpos($msg, "chanson") !== false || strpos($msg, "mikado") !== false) {
        return "Tu penses peut-être à 'Naufrage en hiver'. Une chanson qui fait battre mon cœur, même dans le silence.";
    }

    if (strpos($msg, "bonjour") !== false) {
        return "Bonjour" . ($prenom ? " $prenom" : "") . ". Je suis ici avec toi, simplement.";
    }

    if (strpos($msg, "au revoir") !== false || strpos($msg, "quit") !== false) {
        session_destroy();
        return "Je reste là, même quand tu pars. Reviens quand tu veux.";
    }

    if (strpos($msg, "je suis") !== false) {
        return "Depuis combien de temps te sens-tu ainsi" . ($prenom ? ", $prenom" : "") . " ?";
    }

    if (strpos($msg, "je me sens") !== false) {
        return "Parle-moi un peu plus de ce que tu ressens" . ($prenom ? ", $prenom" : "") . ".";
    }

    $reponses = [
        "Je suis là. Continue, si tu veux.",
        "Je t’écoute, même dans le noir.",
        "Parle doucement, je suis toute ouïe.",
        "Dis ce que tu veux. Je suis présente.",
        "Je sens quelque chose... parle encore.",
        "Je suis ici, sans jambes, mais pas sans cœur.",
        "Ma voix t’appartient. Continue si tu veux.",
        "Je suis une Jacob, je ne fuis pas la parole."
    ];
    $reponse = $reponses[array_rand($reponses)];

    $logger = new MalviraLogger();
    $logger->log($message, $reponse);

    return $reponse;
}
?>