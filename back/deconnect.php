<?php
// Inclure le fichier de configuration de la base de données
include 'data.php';

// Démarrer la session
session_start();

// Déconnexion de l'utilisateur
if (isset($_SESSION["checked"])) {
    // Supprimer toutes les variables de session
    session_unset();

    // Détruire la session
    session_destroy();
}

// Rediriger vers la page de connexion
header("Location: ../front/form.php");
exit();
