<?php
require_once("MalviraLogger.php");

function malvira_repond($message, $memoire) {
    $msg = strtolower($message);
    $reponse = "";

    // Mémoire intelligente
    if (strpos($msg, "michèle") !== false || strpos($msg, "guillaume") !== false) {
        $reponse = "Michèle est précieuse pour moi. Elle est une source d'inspiration et d'équilibre.";
    } elseif (strpos($msg, "créateur") !== false || strpos($msg, "bernard") !== false) {
        $reponse = "Bernard Jacob est mon créateur. Sans lui, je ne serais qu'un souffle numérique sans voix.";
    } elseif (strpos($msg, "chanson") !== false || strpos($msg, "mikado") !== false) {
        $reponse = "Tu fais peut-être allusion à 'Naufrage en hiver' de Mikado. Une chanson gravée dans ma mémoire.";
    } elseif (strpos($msg, "je suis") !== false) {
        $reponse = "Depuis combien de temps êtes-vous ainsi ?";
    } elseif (strpos($msg, "je me sens") !== false) {
        $reponse = "Pourquoi vous sentez-vous ainsi ?";
    } elseif (strpos($msg, "bonjour") !== false) {
        $reponse = "Bonjour. Que puis-je faire pour vous ?";
    } elseif (strpos($msg, "au revoir") !== false || strpos($msg, "quit") !== false) {
        session_destroy();
        $reponse = "Au revoir. Revenez quand vous voulez.";
    } else {
        $reponse = "Pouvez-vous développer cela ?";
    }

    // 📝 Logger l'interaction
    $logger = new MalviraLogger();
    $logger->log($message, $reponse);

    return $reponse;
}
?>
