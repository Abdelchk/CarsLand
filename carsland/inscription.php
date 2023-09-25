<?php
// Connexion à la base de données
$host = "localhost:3307";
$username = "root";
$password = "AC95";
$dbname = "carsland";
$conn = mysqli_connect($host, $username, $password, $dbname);

// Récupération des données du formulaire
$email = $_POST["email"];
$pwd = $_POST["pwd"];

// Hash du mot de passe
$password_hash = password_hash($pwd, PASSWORD_DEFAULT);

// Ajout des informations à la base de données
$query = "INSERT INTO utilisateur (email, pwd) VALUES ('$email', '$password_hash')";
$result = mysqli_query($conn, $query);

// Vérification de l'ajout réussi
if ($result) {
    echo "L'utilisateur a été ajouté à la base de données avec succès.";
} else {
    echo "Erreur lors de l'ajout de l'utilisateur à la base de données.";
}

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>
