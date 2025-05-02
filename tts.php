<?php
require_once("VoixMalvira.php");

$texte = $_GET["texte"] ?? null;
if ($texte) {
    $audio = VoixMalvira::genererAudio($texte);
    if ($audio) {
        echo "<audio controls autoplay><source src='$audio' type='audio/mpeg'></audio>";
    } else {
        echo "Erreur lors de la génération audio.";
    }
} else {
    echo "Aucun texte reçu.";
}
?>