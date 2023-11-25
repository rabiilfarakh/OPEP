<?php

require_once "./traitement.php";

//-------------------------------- Connection-----------------------------------------
if (isset($_POST['submitConn'])) {

    $emailConn = $_POST["emailConn"];
    $mdpConn = $_POST["mdpConn"];

    if (!empty($emailConn) && !empty($mdpConn)) {
        $query = "SELECT * FROM utilisateurs WHERE emailUtl = '$emailConn' AND mdpUtl = '$mdpConn'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            header("Location: index.php");
        } else {
            echo "<script>alert('email ou mdp incorrect')</script>";
        }
     }
   
}

//-------------------------------- Inscription-----------------------------------------

if (isset($_POST['submitInsc'])) {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $emailInsc = $_POST["emailInsc"];
    $mdpInsc = $_POST["mdpInsc"];

    if (!empty($emailInsc) && !empty($mdpInsc) && !empty($nom) && !empty($prenom)) {
        // Insérer l'utilisateur
        $query = "INSERT INTO utilisateurs (nomUtl, prenomUtl, emailUtl, mdpUtl) VALUES ('$nom', '$prenom', '$emailInsc', '$mdpInsc')";
        $result = $conn->query($query);

        if ($result) {
            // Obtenez l'idUtl de l'utilisateur inséré
            $lastUserId = $conn->insert_id;

            // Rediriger vers la page de connexion
            header('Location: connection.php');
            exit(); // Assurez-vous de terminer le script après une redirection
        } else {
            echo "<script>alert('Erreur lors de l'inscription. Veuillez réessayer.')</script>";
        }
    }
}

///-------------------------------- Role------------------------------------------

if (isset($_POST['submitRole'])) {
    $roleValue = $_POST['roleValue'];

    if (!empty($roleValue)) {
        // Obtenez l'idUtl de l'utilisateur inséré
        $lastUserId = $conn->insert_id;

        // Afficher l'idUtl pour le débogage
        echo "Last User ID: " . $lastUserId;

        // Vérifiez si l'idUtl existe
        if ($lastUserId) {
            // Insérer Role
            $query = "INSERT INTO roles (nomRole, idUtl) VALUES ('Admin', '$lastUserId')";
            $result = $conn->query($query);

            // Afficher la requête SQL pour le débogage
            echo "SQL Query: " . $query;

            if ($result) {
                echo "<script>alert('Role avec succès')</script>";
            } else {
                echo "<script>alert('Erreur lors de l'inscription. Veuillez réessayer.')</script>";
            }
        } else {
            echo "<script>alert('Erreur lors de l'inscription de l'utilisateur.')</script>";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body style="background-color: #567255  ">
    <section class="sec1 ">
        <div class="overlay" id="overlay"></div>
        <!-- Section: Design Block -->
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5 mt-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color:aliceblue; font-size: 3.2vw;">
                        The best offer <br />
                    </h1>
                    <p class="mb-4 opacity-70" style="color:aliceblue; font-size: 1.2vw;">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Temporibus, expedita iusto veniam atque, magni tempora mollitia
                        dolorum consequatur nulla, neque debitis eos reprehenderit quasi
                        ab ipsum nisi dolorem modi. Quos?
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div class="card bg-glass" style="width: 28vw;">
                        <div class="card-body px-4 py-5 px-md-5">

                            <!-- Form_Connection -->
                            <form method="POST" id="inscriptionForm">
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" name="emailConn" class="form-control" placeholder="Email address" />
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" name="mdpConn" class="form-control" placeholder="Password" />
                                </div>

                                <!-- Submit button -->
                                <button type="button" name="submitConn" id="submitConnBtn" class="btn btn-block mb-4" style="background-color: hsl(218, 81%, 85%);" onclick="validateAndSubmitConnForm()">
                                    Se connecter
                                </button>

                                <!-- Inscription button -->
                                <button type="button" class="btn mt-3" style="width: 14vw; background-color: #567255; color:aliceblue" onclick="openInscriptionModal()">
                                    S'inscrire
                                </button>
                            </form>
                            <!-- Fin -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->

    <!-- Inscription Modal -->
    <div class="modal" id="inscriptionModal" tabindex="-1" role="dialog" aria-labelledby="inscriptionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inscriptionModalLabel">Inscription</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeInscriptionModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="popup" id="popup">
                        <!-- Form_Inscription -->
                        <form method="POST" id="inscriptionForm2">
                            <div class="d-flex ">
                                <!-- Nom input -->
                                <div class="form-outline mb-4 col-md-6">
                                    <input type="text" name="nom" class="form-control" placeholder="Nom" />
                                </div>
                                <!-- Prénom input -->
                                <div class="form-outline mb-4 col-md-6">
                                    <input type="text" name="prenom" class="form-control" placeholder="Prénom" />
                                </div>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4 d-flex justify-content-center">
                                <input type="email" name="emailInsc" class="form-control" style="width: 28.5vw;" placeholder="Email address" />
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4 d-flex justify-content-center">
                                <input type="password" name="mdpInsc" class="form-control" style="width: 28.5vw;" placeholder="Password" />
                            </div>

                            <!-- Submit button -->
                            <div class="form-outline mb-4 d-flex justify-content-center">
                                <!-- Inscription button -->
                                <button type="button" name="submitInsc" id="submitInscBtn" class="btn btn-block mb-4 mt-2" style="background-color: #3C873B; color:aliceblue ;  width: 28.5vw;" onclick="validateAndSubmitInscForm()">
                                    S'inscrire
                                </button>
                            </div>
                        </form>
                        <!-- Fin -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Inscription -->

    <!-- Role -->
    <div class="modal" id="roleSelectionModal" tabindex="-1" role="dialog" aria-labelledby="roleSelectionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="roleSelectionModalLabel">Sélection du rôle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeRoleModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulaire pour la sélection du role -->
                    <form method="POST" id="roleSelectionForm">
                        <label for="role">Choisissez votre rôle :</label>
                        <select name="roleValue" id="role" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="client">Client</option>
                        </select>
                        <!-- Champ caché pour stocker le rôle sélectionné -->
                        <input type="hidden" name="selectedRole" id="selectedRole" />
                        <br>
                        <button type="submit" name="submitRole" class="btn btn-block mb-4 mt-2" style="background-color: #3C873B; color:aliceblue; width: 100%;" onclick="validateAndSubmitRoleForm()">
                            Terminer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Role -->

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="javascripte.js"></script>
</body>

</html>