<?php
session_start();

// Connexion à la base de données
$host = "localhost:3307";
$username = "root";
$password = "AC95";
$dbname = "carsland";
$conn = mysqli_connect($host, $username, $password, $dbname);

// Vérifier la connexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Récupérer les données du formulaire
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$pwd = mysqli_real_escape_string($conn, $_POST["pwd"]);

// Préparer la requête pour récupérer les informations de l'utilisateur
$query = "SELECT id, email, pwd FROM utilisateur WHERE email = '$email'";

// Exécuter la requête
$result = mysqli_query($conn, $query);

// Vérifier si l'utilisateur existe
if (mysqli_num_rows($result) == 1) {
    // Récupérer les informations de l'utilisateur
    $user = mysqli_fetch_assoc($result);

    // Vérifier si le mot de passe est correct
    if (password_verify($pwd, $user["pwd"])) {
        // Stocker les informations de l'utilisateur dans une session
        $_SESSION["utilisateur_id"] = $user["id"];
        $_SESSION["email"] = $user["email"];

        // Définir la variable de session pour indiquer que l'utilisateur est connecté
        $_SESSION["isConnected"] = true;

        // Rediriger l'utilisateur vers la page d'accueil
        header("Location: index.html");
    } else {
        // Afficher un message d'erreur
        echo "<p>Nom d'utilisateur ou mot de passe incorrect</p>";
    }
} else {
    // Afficher un message d'erreur
    echo "<p>Nom d'utilisateur ou mot de passe incorrect</p>";
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>