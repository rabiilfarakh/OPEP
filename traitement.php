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
    $query = "SELECT * FROM utilisateurs WHERE emailUtl = '$emailConn' AND mdpUtl = '$mdpConn'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        header("Location: index.php");

    } else {
        echo "failure";
    }
}

?>