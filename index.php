<?php
session_start();
require_once("VoixMalvira.php");

if (!isset($_SESSION["chat"])) {
    $_SESSION["chat"] = [];
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["message"])) {
    $message = trim($_POST["message"]);
    $reponse = "Bonjour, je suis Malvira. Que puis-je faire pour vous ?";
    $_SESSION["chat"][] = [
        "user" => $message,
        "malvira" => $reponse,
        "time" => date("H:i")
    ];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Malvira Voix</title>
</head>
<body>
    <h2>Malvira avec voix (gTTS)</h2>
    <?php foreach ($_SESSION["chat"] as $entry): ?>
        <p>
            <strong>Vous :</strong> <?= htmlspecialchars($entry["user"]) ?><br>
            <strong>Malvira :</strong> <?= htmlspecialchars($entry["malvira"]) ?>
            <a href="tts.php?texte=<?= urlencode($entry["malvira"]) ?>" target="_blank" title="Écouter la voix">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#0077cc" viewBox="0 0 16 16" style="vertical-align: middle;">
  <path d="M11.536 14.01a.75.75 0 0 1-1.04-.282 7.5 7.5 0 0 0 0-11.457.75.75 0 1 1 .96-1.14 9 9 0 0 1 0 13.739.75.75 0 0 1-.282.14.75.75 0 0 1-.282.002.75.75 0 0 1-.282-.002z"/>
  <path d="M10.354 12.475a.75.75 0 0 1-1.008-.329 5.25 5.25 0 0 0 0-8.294.75.75 0 1 1 .936-1.2 6.75 6.75 0 0 1 0 10.692.75.75 0 0 1-.282.13.75.75 0 0 1-.282.001.75.75 0 0 1-.282-.001z"/>
  <path d="M9 8a3 3 0 0 1-3 3H4a.75.75 0 0 1-.75-.75v-4.5A.75.75 0 0 1 4 5h2a3 3 0 0 1 3 3z"/>
</svg>
</a>
        </p>
    <?php endforeach; ?>
    <form method="post">
        <input type="text" name="message" required autofocus>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>