<?php
// Inclure le fichier de configuration de la base de données
include 'data.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer le mot de passe depuis le formulaire
    $text = $_POST["text"];

    // Requête SQL pour récupérer le mot de passe haché depuis la bd
    $sql = "SELECT text FROM checking";
    $result = mysqli_query($conn, $sql);

    // Vérifier si la requête a renvoyé un résultat
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $text_hache = $row["text"];

        // Vérifier si le mot de passe saisi correspond au mot de passe dans la bd
        if (password_verify($text, $text_hache)) {
            session_start();
            $_SESSION["checked"] = true;
            header("Location: ../front/liste.php");
            exit();
        } else {
            // Mot de passe incorrect, afficher un message d'erreur
            echo "Mot de passe incorrect.";
        }
    }

    // Fermer la connexion à la bd
    mysqli_close($conn);
}
