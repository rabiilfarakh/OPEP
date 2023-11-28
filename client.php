

<?php include("traitement.php"); 

session_start();
$userId = $_SESSION['idUtl'];
$reqet="SELECT * FROM panier JOIN plantes ON panier.idPlante = plantes.idPlante WHERE idUtl= $userId";
$result2 = $conn->query($reqet);
$count = mysqli_num_rows($result2);

if (isset($_POST['addToCart'])) {
    
    $plantId = $_POST['addToCart'];

    $insertQuery = "INSERT INTO panier (idUtl, idPlante, quantite) VALUES ('$userId','$plantId',1)";
    $result = $conn->query($insertQuery);
   
    if ($result) {
        // rje3 l page li 9bel
        header('location:' . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        echo "<script>alert('erreur d'ajout')</script>";
    }
}

?>

<!DOCTYPE html>
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

        .sec3 .card {
            height: 26vw;
            margin-bottom: 1.5rem;
            color: black; 
            max-width: 19.5rem;
            background-color: white;
            text-align: center;
            padding: 10px;
            border-radius: 20px;
        }

        .card-img-custom {
            width: 40%;
            height: 10vw;
            object-fit: cover;
            border-radius: 8px;
        }

        .card-body {
            height: 100%;
        }

        .card-text {
            margin-bottom: 1rem; 
            color: #4F772D; 
            text-align: left;
        }

        .card-title {
            color: #4F772D;
            text-align: left; 
        }

        .pagination {
            justify-content: center;


        }
        .count{
            color: white;
            padding: 0px 6px;
            background-color: red;
            border-radius: 40px;
            right: 35px;
            top:25px;
        }
        .panier{
            position: fixed;
            right: 40px;
        }
    </style>
</head>
<body>
    <header>
        <nav  style="height: 40px;display: flex;justify-content: space-between; padding:40px ; margin-top:-40px">
            
            <div class="logo" style="color:black "></div>
            <a href="panier.php" class="panier">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
            </svg>
            </a>
            <p class="position-fixed count"><?php echo $count ?></p>
        </nav>
    </header>
    <section class="sec1">
        
        <div class="container text-center">
            <div class="row">
                <div class="col" style="margin-top: 7vw;">
                    <h1 class="text-left" style="color:white">
                        Grow Your Own <span style="color: #4F772D;">Favourite</span> plant
                    </h1>
                    <p class="mb-4 opacity-70 text-left mt-2" style="color:white">
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
    <section class="sec2 d-flex justify-content-center mt-5">
        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="border:1px solid white; border-radius:20px; width:40%;">
            <div class="container-fluid "style="dispaly:flex; gap:1.3vw">
                <form method="get" action="" class="d-flex justify-content-center" role="search">
                    <a class="navbar-brand" href="?view_all" style="color:white">View All</a>

                    <select name="categorie" id="categorieSelect" style="border-radius: 5px; height:38px" onchange="submitForm()">
                        <option value="all">Toutes les catégories</option>
                        <?php
                        $categoriesQuery = $conn->query("SELECT DISTINCT idCategorie, nomCategorie FROM categories");
                        $categories = $categoriesQuery->fetch_all(MYSQLI_ASSOC);
                        foreach ($categories as $category) {
                            echo '<option value="' . $category['idCategorie'] . '">' . $category['nomCategorie'] . '</option>';
                        }
                        ?>
                    </select>


                </form>
                <form method="get" class="d-flex "style="gap:1px">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search" id="searchInput">
                    <button class="btn btn-outline-success" name="search_but" type="sumbit">Search</button>
                </form>
            </div>
        </nav>
    </section>
    <section class="sec3">
        <div class="container mt-5">
            <?php
            $limit = 6;
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $start = ($page - 1) * $limit;

            // Vérifie si le formulaire est soumis
            if (isset($_GET['view_all'])) {
                $plantesQuery = $conn->query("SELECT * FROM plantes LIMIT $start, $limit");
            } elseif(isset($_GET['search_but'])) {
                $nomPlante = $_GET['search'];
                $plantesQuery = $conn->query("SELECT * FROM plantes WHERE nomPlante LIKE '%$nomPlante%'");
                
            }else{
                // Récupère la catégorie sélectionnée
                $categoryFilter = (isset($_GET['categorie']) && $_GET['categorie'] != 'all') ? "WHERE idCategorie = {$_GET['categorie']}" : "";

                // Mettez à jour la requête pour inclure le filtre de catégorie
                $plantesQuery = $conn->query("SELECT * FROM plantes $categoryFilter LIMIT $start, $limit");
            }

            $counter = 0;
            if(mysqli_num_rows($plantesQuery) > 0){
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
                    echo '<div class="d-flex justify-content-center">';
                    //---------------------------------- form-btn--------------------------------------
                    echo '<form method="POST" >';
                    echo '<button class="btn btn-success panier-btn mt-2" name="addToCart" value="' . $plante['idPlante'] . '">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                    <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z"/>
                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                  </svg>
                        Ajouter
                    </button>';
                    echo '</form>';
                    //fin
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
            }else{
                echo "<script>alert('La plante n existe pas')</script>";
            }
            

           
            ?>
        </div>

        <!-- ... (Pagination) ... -->

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
    <script>
    function submitForm() {
        document.getElementById('categorieSelect').form.submit();
    }
        function searchPlants() {
        document.getElementById('categorieSelect').form.submit();
    }
    </script>
    
</body>
</html>

