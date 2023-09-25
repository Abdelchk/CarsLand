<?php
session_start();
// Vérifier si l'utilisateur est connecté
$isConnected = isset($_SESSION['isConnected']) && $_SESSION['isConnected'];

// Répondre au format JSON
header('Content-Type: application/json');
echo json_encode(array('isConnected' => $isConnected));
?>