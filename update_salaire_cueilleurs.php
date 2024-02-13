<?php
include('check_permissions.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer et valider les données du formulaire
    $cueilleur_id = intval($_POST["cueilleur_id"]);
    $montant_par_kg = floatval($_POST["montant_par_kg"]);

    // Effectuer la mise à jour dans la base de données en utilisant des requêtes préparées
    include('config.php');

    $update_query = "INSERT INTO SalaireCueilleurs (cueilleur_id, montant_par_kg)
                     VALUES (?, ?)
                     ON DUPLICATE KEY UPDATE montant_par_kg = ?";

    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("ddd", $cueilleur_id, $montant_par_kg, $montant_par_kg);

    if ($stmt->execute()) {
        header("Location: dashboard.php"); // Rediriger vers le tableau de bord après la mise à jour
        exit();
    } else {
        echo "Erreur lors de la mise à jour : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
