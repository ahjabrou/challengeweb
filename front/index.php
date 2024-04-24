<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">

    <title>Soumission</title>
</head>

<body>
    <?php include 'header.php' ?>
    <main>
        <div class="container">
            <div class="row">
                <div class=" hide-on-small-only col s12 m5 l5">
                    <h2 class="presentation">
                        Hello, bienvenue sur notre plateforme. Veuillez utiliser ce formulaire pour soumettre votre document
                    </h2>
                </div>
                <div class="col s12 m7 l7">
                    <h1>Soumettre un document</h1>
                    <?php
                    session_start();
                    // Vérifier si la variable de session pour le message de succès est définie
                    if (isset($_SESSION["success_message"])) {
                        // Afficher l'alerte de succès
                        echo '<div class="teal lighten-5 center" style="color:green;">' . $_SESSION["success_message"] . '</div>';

                        // Supprimer la variable de session après affichage
                        unset($_SESSION["success_message"]);
                    }
                    ?>
                    <div class="row">
                        <form class="col s12" action="../back/envoi.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="icon_prefix" type="text" name="nom" class="validate">
                                    <label for="icon_prefix">Nom</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">phone_android</i>
                                    <input id="icon_telephone" type="tel" name="numero" class="validate">
                                    <label for="icon_telephone">Téléphone</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">text_fields</i>
                                    <input id="icon_titre" type="text" name="titre" class="validate">
                                    <label for="icon_titre">Titre</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">mode_edit</i>
                                    <input id="icon_desc" type="text" name="description" class="validate">
                                    <label for="icon_desc">Description</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="file-field input-field col s12">
                                    <div class="btn purple lighten-4">
                                        <span>Fichier</span>
                                        <input type="file" name="document" required>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>

                            <button class="btn waves-effect waves-light btn-large purple lighten-4" type="submit" name="submit" onclick="M.toast({html:'envoi', classes:'rounded'})">Soumettre
                                <i class="material-icons right">send</i>
                            </button>

                        </form>
                    </div>
                    <a href="../front/liste.php">
                        <p style="color:teal;">Voir la liste des documents</p>
                    </a>
                </div>
            </div>

        </div>
    </main>
    <?php include 'footer.php'  ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>

</html>