<?php
header('Content-Type: application/json; charset=utf-8');
$file = '../data/malvira_memoire.json';
if (file_exists($file)) {
    echo file_get_contents($file);
} else {
    echo json_encode(["error" => "Mémoire non disponible"]);
}
?>