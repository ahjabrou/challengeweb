<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>Liste</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <div class="container">
            <table class="responsive-table highlight">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Numéro de Téléphone</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Document</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    include '../back/data.php';
                    session_start();

                    if (!isset($_SESSION["checked"])) {

                        header("Location: form.php");
                        exit;
                    }

                    $results_per_page = 5;
                    $sql = "SELECT nom, numero, titre, description, document FROM document_envoi ORDER BY id DESC";
                    $result = mysqli_query($conn, $sql);
                    $number_of_results = mysqli_num_rows($result);
                    $number_of_pages = ceil($number_of_results / $results_per_page);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $this_page_first_result = ($page - 1) * $results_per_page;

                    $sql .= " LIMIT " . $this_page_first_result . ',' . $results_per_page;
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $row['nom']; ?></td>
                                <td><?php echo $row['numero']; ?></td>
                                <td><?php echo $row['titre']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><a href="../uploads/<?php echo $row['document']; ?>" target="_blank"><?php echo $row['document']; ?></a></td>
                            </tr>
                        <?php
                        }
                    } else { ?>
                        <tr>
                            <td colspan="5">Aucune donnée trouvée</td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>


            <ul class="pagination">
                <?php for ($page = 1; $page <= $number_of_pages; $page++) : ?>
                    <li class="<?php if (isset($_GET['page']) && $_GET['page'] == $page) echo 'active'; ?>">
                        <a href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </div>
        <a href="../back/deconnect.php">
            <p class="center" style="color:teal;">Déconnexion</p>
        </a>
        </div>
    </main>
    <?php include 'footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>