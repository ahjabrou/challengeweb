<?php
include 'data.php';
session_start();

// Liste des extensions de fichier autorisées
$allowed_extensions = array('pdf', 'docx', 'doc', 'ppt', 'xlsx', 'csv');

// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {
    // Vérifier si la connexion est établie
    if ($conn) {
        $nom = $_POST['nom'];
        $numero = $_POST['numero'];
        $titre = $_POST['titre'];
        $description = $_POST['description'];

        // Obtenir l'extension du fichier téléchargé
        $uploaded_file_extension = strtolower(pathinfo($_FILES["document"]["name"], PATHINFO_EXTENSION));

        // Vérifier si l'extension est autorisée
        if (in_array($uploaded_file_extension, $allowed_extensions)) {
            // Traiter le document uploadé
            $upload_dir = "../uploads/";
            $document_name = basename($_FILES["document"]["name"]);
            $document_path = $upload_dir . $document_name;

            // Déplacer le fichier vers le dossier d'upload
            if (move_uploaded_file($_FILES["document"]["tmp_name"], $document_path)) {
                // Requête pour insérer les données dans la base de données
                $sql = "INSERT INTO document_envoi (nom, numero, titre, description, document) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "sssss", $nom, $numero, $titre, $description, $document_name);

                // Exécuter la requête
                if (mysqli_stmt_execute($stmt)) {
                    $_SESSION["success_message"] = "Le formulaire a été soumis avec succès!";
                    header('Location: ../front/index.php');
                } else {
                    echo "Erreur lors de l'insertion dans la base de données: " . mysqli_error($conn);
                }
            } else {
                echo "Erreur lors du téléchargement du document.";
            }
        } else {
            echo "L'extension de fichier n'est pas autorisée. Veuillez télécharger un fichier PDF, DOCX, DOC, PPT, XLSX ou CSV.";
        }
    } else {
        echo "Erreur de connexion à la base de données.";
    }
    mysqli_close($conn);
}
