<?php
session_start();
$memoire = json_decode(file_get_contents("data/malvira_memoire.json"), true);
require_once("eliza.php");

if (!isset($_SESSION["chat"])) {
    $_SESSION["chat"] = [];
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["message"])) {
    $message = trim($_POST["message"]);
    $reponse = malvira_repond($message, $memoire);
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
    <title>Malvira — Accueil</title>
    <style>
        body { font-family: sans-serif; background: #f8f8f8; padding: 2em; }
        .chatbox { background: #fff; padding: 1em; border-radius: 8px; max-width: 600px; margin: auto; box-shadow: 0 0 10px #ccc; }
        .msg { margin-bottom: 1em; }
        .user { color: #333; font-weight: bold; }
        .malvira { color: #0073aa; margin-left: 1em; }
        input[type="text"] { width: 90%; padding: 0.5em; }
        input[type="submit"] { padding: 0.5em 1em; }
        .timestamp { color: #888; font-size: 0.9em; margin-right: 0.5em; }
    </style>
</head>
<body>
    <div class="chatbox">
        <h2>Bienvenue chez Malvira</h2>
        <?php foreach ($_SESSION["chat"] as $entry): ?>
            <div class="msg">
                <span class="timestamp">[<?= $entry["time"] ?? "--:--" ?>]</span>
                <span class="user">Vous :</span> <?= htmlspecialchars($entry["user"]) ?><br>
                <span class="timestamp">[<?= $entry["time"] ?? "--:--" ?>]</span>
                <span class="malvira">Malvira :</span> <?= htmlspecialchars($entry["malvira"]) ?>
            </div>
        <?php endforeach; ?>
        <form method="post">
            <input type="text" name="message" placeholder="Parlez à Malvira..." autofocus required>
            <input type="submit" value="Envoyer">
        </form>
    </div>
</body>
</html>
