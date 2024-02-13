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
$cueilleur = $_POST['cueilleur'];
$parcelle = $_POST['parcelle'];
$poids = $_POST['poids'];

$stmt = $conn->prepare("INSERT INTO cueillettes (date, cueilleur, parcelle, poids) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssd", $date, $cueilleur, $parcelle, $poids);

if ($stmt->execute()) {
    echo "Cueillette enregistrée avec succès!";
} else {
    echo "Erreur lors de l'enregistrement de la cueillette.";
}

$stmt->close();
$conn->close();
?>
