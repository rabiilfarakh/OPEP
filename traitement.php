<?php
$servername = "localhost";
$username = "root";
$password = "167200216";
$database = "OPEP";

$conn = new mysqli($servername, $username, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

$emailConn = $_POST["emailConn"]; 
$mdpConn = $_POST["mdpConn"];
$submitConn = $_POST["submitConn"];

if(isset($submitConn)){
    if(!empty($emailConn) && !empty($mdpConn)){
        $query = "SELECT * FROM utilisateurs WHERE emailUtl = '$emailConn' AND mdpUtl = '$mdpConn'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            header("Location: index.php");

        } else {
            echo "<scriptee>alert('erreur')</scripte>";
        }
    }
}

// Inscription
$role = $_POST["role"];
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$emailInsc = $_POST["emailInsc"]; 
$mdpInsc = $_POST["mdpInsc"];
$submitInsc = $_POST["submitInsc"];

if(isset($submitInsc)){
    if(!empty($emailInsc) && !empty($mdpInsc) && !empty($nom) && !empty($prenom)){
        // Insérer l'utilisateur
        $query = "INSERT INTO utilisateurs (nomUtl, prenomUtl, emailUtl, mdpUtl) VALUES ('$nom', '$prenom', '$emailInsc', '$mdpInsc')";
        $result = $conn->query($query);

        // Obtenez l'idUtl de l'utilisateur inséré
        $lastUserId = $conn->insert_id;

        // Insérer le rôle avec l'idUtl
        $query2 = "INSERT INTO roles (nomRole, idUtl) VALUES ('Admin', '$lastUserId')";
        $result2 = $conn->query($query2);

        if ($result && $result2) {
            echo "<script>alert('Inscription réussie !');</script>";
        } else {
            echo "<script>alert('Erreur lors de l\'inscription !');</script>";
        }
    } else {
        echo "<script>alert('Veuillez remplir tous les champs !');</script>";
    }
}


?>