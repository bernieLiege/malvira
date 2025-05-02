<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $query = $_POST['query'];

    // URL de votre service Xcas
    $apiUrl = "https://www-fourier.ujf-grenoble.fr/~parisse/xcasen.html"; // Remplacez par l'URL correcte de votre service

    // Paramètres de la requête
    $params = [
        'query' => $query
    ];

    // Initialiser cURL
    $ch = curl_init();

    // Configurer les options cURL
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Exécuter la requête
    $response = curl_exec($ch);

    // Vérifier les erreurs
    if (curl_errno($ch)) {
        echo 'Erreur cURL : ' . curl_error($ch);
    } else {
        echo '<h2>Résultat :</h2>';
        echo '<pre>' . htmlspecialchars($response) . '</pre>';
    }

    // Fermer cURL
    curl_close($ch);
} else {
    echo "Méthode de requête non autorisée.";
}
?>
