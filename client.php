d<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styleClient.css">
    <title>Document</title>
    <style>
        body {
            background-color: #132A13;
            color: aliceblue;
            margin-top: 2rem;
        }

        .sec1 h1 {
            font-size: 3.5vw;
            width: 24vw;
            color: black;
        }

        .sec1 p {
            font-size: 1.2vw;
            margin-top: 2rem;
            color: black;
        }

        .sec1 button {
            color: white;
            background-color: transparent;
            border: 2px solid white;
            width: 10vw;
            margin-top: 2rem;
        }

        .sec2 .card {
            margin-bottom: 1.5rem;
            color: black; /* Couleur du texte pour la carte */
            max-width: 19.5rem;
            background-color: rgba(255, 255, 255, 0.6); /* Fond de la carte semi-transparent */
            text-align: center; /* Centrer le texte */
        }

        .card-img-custom {
            width: 40%; /* La largeur de l'image est maintenant fixée à 100% de la largeur de son conteneur parent */
            height: 12vw; /* Ajustez la hauteur des images selon vos préférences */
            object-fit: cover;
            border-radius: 8px; /* Ajouter des coins arrondis à l'image */
        }

        .card-body {
            height: 100%;
        }

        .card-text {
            margin-bottom: 1rem; /* Ajuster la marge entre les éléments */
            color: #4F772D; /* Couleur du texte pour la description, le prix et le stock */
            text-align: left; /* Aligner le texte à gauche */
        }

        .card-title {
            color: #4F772D; /* Couleur du texte pour le titre (nom de la plante) */
            text-align: left; /* Aligner le titre à gauche */
        }

        .pagination {
            justify-content: center; /* Centrer la pagination */
        }
    </style>
</head>
<body>
    <section class="sec1">
        <div class="container text-center">
            <div class="row">
                <div class="col" style="margin-top: 7vw;">
                    <h1 class="text-left">
                        Grow Your Own <span style="color: #4F772D;">Favourite</span> plant
                    </h1>
                    <p class="mb-4 opacity-70 text-left mt-2">
                        We help you plant your first plant and create your own beautiful garden with our plant collection.
                    </p>
                    <button type="button" class="btn btn-block mb-4 btn-hover">
                        Learn more
                    </button>
                </div>
                <div class="col">
                    <img src="plantes/o.png" alt="Image de plantes">
                </div>
            </div>
        </div>
    </section>

    <!-- ... ________________ ... -->
    <section class="sec2">
        <div class="container mt-5">
            <?php
            include("traitement.php");
            $limit = 6;
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $start = ($page - 1) * $limit;

            $plantesQuery = $conn->query("SELECT * FROM plantes LIMIT $start, $limit");
            $counter = 0;

            while ($plante = $plantesQuery->fetch_assoc()) {
                if ($counter % 3 == 0) {
                    echo '<div class="row">';
                }
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card">';
                echo '<div class="d-flex justify-content-center">';
                echo '<img " src="' . $plante['imagePlante'] . '" class="card-img-top card-img-custom" alt="' . $plante['nomPlante'] . '">';
                echo '</div>';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $plante['nomPlante'] . '</h5>';
                echo '<hr>';
                echo '<div class="text-left">';
                echo '<p class="card-text mb-2"><strong>Description:</strong> <span style="color:black;">' . $plante['descriptionPlante'] . '</span></p>';
                echo '<p class="card-text mb-2"><strong>Price:</strong> <span style="color:black;">' . $plante['prix'] . 'DH </span></p>';
                echo '<p class="card-text mb-2"><strong>Stock:</strong> <span style="color:black;">' . $plante['stock'] . '</span></p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

                if ($counter % 3 == 2) {
                    echo '</div>';
                }   

                $counter++;
            }

            if ($counter % 3 != 0) {
                echo '</div>';
            }
            ?>
        </div>

        <!-- ... (Pagination existante) ... -->

        <?php
        $result = $conn->query("SELECT COUNT(idPlante) AS total FROM plantes");
        $row = $result->fetch_assoc();
        $total_pages = ceil($row["total"] / $limit);

        echo '<nav aria-label="Page navigation example">';
        echo '<ul class="pagination">';
        for ($i = 1; $i <= $total_pages; $i++) {
            echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
        }
        echo '</ul>';
        echo '</nav>';
        ?>
    </section>
</body>
</html>
