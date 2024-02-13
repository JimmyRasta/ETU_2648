<?php
include('check_permissions.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = htmlspecialchars(trim($_POST["numero"]));
    $surface_hectares = floatval($_POST["surface_hectares"]);
    $variete_id = intval($_POST["variete_id"]);

    include('config.php');

    $insert_query = "INSERT INTO Parcelles (numero, surface_hectares, variete_id)
                     VALUES (?, ?, ?)";

    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("sdi", $numero, $surface_hectares, $variete_id);

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
