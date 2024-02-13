<?php
include('check_permissions.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = htmlspecialchars(trim($_POST["nom"]));
    $occupation_m2 = floatval($_POST["occupation_m2"]);
    $rendement_kg_par_mois = floatval($_POST["rendement_kg_par_mois"]);

    include('config.php'); 

    $insert_query = "INSERT INTO VarietesDeThe (nom, occupation_m2, rendement_kg_par_mois)
                     VALUES (?, ?, ?)";

    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("sdd", $nom, $occupation_m2, $rendement_kg_par_mois);

    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Erreur lors de l'insertion: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

