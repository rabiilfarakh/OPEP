<?php

require_once "traitement.php";

// Assurez-vous que la méthode de soumission est POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifiez si le formulaire d'ajout de plante est soumis
    if (isset($_POST['submitPlante'])) {
        // Récupérez les données du formulaire
        $nomPlante = $_POST['nomPlante'];
        $imagePlante = $_POST['imagePlante'];
        $descriptionPlante = $_POST['descriptionPlante'];
        $stockPlante = $_POST['stockPlante'];
        $prixFr = $_POST['prixFr'];

        // Validez les données au besoin

        // Effectuez la connexion à la base de données

        // Préparez la requête d'insertion dans la table plantes
        $query = $conn->prepare("INSERT INTO plantes (nomPlante, imagePlante, descriptionPlante, stockPlante, prixFr) VALUES (?, ?, ?, ?, ?)");
        $query->bind_param("sssis", $nomPlante, $imagePlante, $descriptionPlante, $stockPlante, $prixFr);

        // Exécutez la requête
        if ($query->execute()) {
            echo "Plante ajoutée avec succès.";
        } else {
            echo "Erreur lors de l'ajout de la plante. Veuillez réessayer.";
        }

        // Fermez la connexion
        $conn->close();
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleAdmin.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>VM store.</title>
</head>
<body class="body">
    <section class="header">
        <h1><span style="color: var(--bg-color-third);">O</span>P<span style="color: var(--bg-color-third);">E</span>P</h1>
    </section>
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
                <li>
                    <a href="#" class="active">
                        <div class="sidebar--item">Ajouter Catégorie</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="sidebar--item">Modifier Catégorie</div>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="afficherFormulaireAjoutPlante()">
                        <div class="sidebar--item">Ajouter Plante</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="sidebar--item">Supprimer Plante</div>
                    </a>
                </li>
            </ul>
            <ul class="sidebar--bottom--items">
                <li>
                    <a href="connection.php">
                        <span class="icon"><i class="ri-logout-box-r-line"></i></span>
                        <div class="sidebar--item">Logout</div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main--container">
            <div class="form-container" id="formContainer">
                <!-- Ici, le formulaire apparaîtra après le clic sur "Ajouter Plante" -->
            </div>
        </div>
    </section>

    <script>
        function afficherFormulaireAjoutPlante() {
            var formContainer = document.getElementById("formContainer");
            formContainer.innerHTML = `
                <h2>Ajouter Plante</h2>
                <form method="POST" action="traitement.php">
                    <!-- Ajoutez les champs nécessaires pour l'ajout de la plante -->
                    <!-- Exemple : -->
                    <label for="nomPlante">Nom de la Plante:</label>
                    <input type="text" id="nomPlante" name="nomPlante" required><br>

                    <label for="imagePlante">Image de la Plante (URL):</label>
                    <input type="url" id="imagePlante" name="imagePlante" required><br>

                    <label for="descriptionPlante">Description:</label>
                    <textarea id="descriptionPlante" name="descriptionPlante" required></textarea><br>

                    <label for="stockPlante">Stock:</label>
                    <input type="number" id="stockPlante" name="stockPlante" required><br>

                    <label for="prixFr">Prix (en Francs CFA):</label>
                    <input type="number" id="prixFr" name="prixFr" required><br>

                    <!-- ... Ajoutez d'autres champs si nécessaire ... -->

                    <button type="submit" name="submitPlante">Ajouter</button>
                </form>
            `;
        }
    </script>
</body>
</html>
