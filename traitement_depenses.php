<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion_the";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion à la base de données: " . $conn->connect_error);
}

$date = $_POST['date'];
$categorie = $_POST['categorie'];
$montant = $_POST['montant'];

$stmt = $conn->prepare("INSERT INTO depenses (date, categorie, montant) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $date, $categorie, $montant);

if ($stmt->execute()) {
    echo "Dépense enregistrée avec succès.";
} else {
    echo "Erreur lors de l'enregistrement de la dépense: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
