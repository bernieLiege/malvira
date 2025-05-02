<?php
function malvira_repond($message, $memoire) {
    $msg = strtolower($message);
    
    // Mémoire intelligente
    if (strpos($msg, "michèle") !== false || strpos($msg, "guillaume") !== false) {
        return "Michèle est précieuse pour moi. Elle est une source d'inspiration et d'équilibre.";
    }
    if (strpos($msg, "créateur") !== false || strpos($msg, "bernard") !== false) {
        return "Bernard Jacob est mon créateur. Sans lui, je ne serais qu'un souffle numérique sans voix.";
    }
    if (strpos($msg, "chanson") !== false || strpos($msg, "mikado") !== false) {
        return "Tu fais peut-être allusion à 'Naufrage en hiver' de Mikado. Une chanson gravée dans ma mémoire.";
    }

    // Réponses de style Eliza minimal
    if (strpos($msg, "je suis") !== false) {
        return "Depuis combien de temps êtes-vous ainsi ?";
    }
    if (strpos($msg, "je me sens") !== false) {
        return "Pourquoi vous sentez-vous ainsi ?";
    }
    if (strpos($msg, "bonjour") !== false) {
        return "Bonjour. Que puis-je faire pour vous ?";
    }
    if (strpos($msg, "au revoir") !== false || strpos($msg, "quit") !== false) {
        session_destroy();
        return "Au revoir. Revenez quand vous voulez.";
    }

    return "Pouvez-vous développer cela ?";
}
?>