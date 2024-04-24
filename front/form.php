<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">

    <title>Document</title>

</head>

<body>
    <?php include 'header.php' ?>
    <main>



        <h3 class="center">Connectez-vous pour accéder à la liste</h3>
        <div class="container center">
            <div class="row ">
                <form class="col s12" action="../back/checkAdmin.php" method="POST">
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <input id="password" type="password" name="text" class="validate">
                            <label for="icon_desc">Mot de passe</label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light btn-large purple lighten-4" type="submit" name="submit">connecter
                    </button>

                </form>

            </div>

            <a href="../front/index.php">
                <p class="center" style="color:teal;">Retour au formulaire de soumission</p>
            </a>


        </div>
    </main>
    <?php include 'footer.php'  ?>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</html>