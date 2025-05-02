<?php
require 'ProcessHandler.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $query = $_POST['query'];

    // Instancier la classe ProcessHandler
    $processHandler = new ProcessHandler($query);

    // Traiter la requête
    $result = $processHandler->processQuery();

    // Afficher le résultat
    echo '<h2>Résultat :</h2>';
    echo '<pre>' . htmlspecialchars($result) . '</pre>';
} else {
    echo "Méthode de requête non autorisée.";
}
?>
