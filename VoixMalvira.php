<?php
class VoixMalvira {
    public static function genererAudio(string $texte): ?string {
        $fichier = "tts_" . time() . ".mp3";
        $chemin = __DIR__ . "/audio/" . $fichier;

        // Création du dossier audio si non existant
        if (!file_exists(__DIR__ . "/audio")) {
            mkdir(__DIR__ . "/audio", 0777, true);
        }

        // Nettoyage du texte
        $texte = escapeshellarg($texte);

        // Utilisation de gTTS via Python
        $commande = "python3 -c \"from gtts import gTTS; gTTS(text={$texte}, lang='fr').save('{$chemin}')\"";
        exec($commande);

        return file_exists($chemin) ? "audio/" . $fichier : null;
    }
}
?>