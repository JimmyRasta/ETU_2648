<?php
include('check_permissions.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categorie = htmlspecialchars(trim($_POST["categorie"]));

    include('config.php');

    $insert_query = "INSERT INTO CategoriesDepenses (categorie)
                     VALUES (?)";

    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("s", $categorie);

    if ($stmt->execute()) {
        header("Location: dashboard.php"); 
        exit();
    } else {
        echo "Erreur lors de l'insertion : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
