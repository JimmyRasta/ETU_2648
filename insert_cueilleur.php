<?php
include('check_permissions.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = htmlspecialchars(trim($_POST["nom"]));
    $genre = $_POST["genre"];

    if ($genre !== "Homme" && $genre !== "Femme") {
        echo "Erreur : Genre non valide.";
        exit();
    }

    $date_naissance_raw = $_POST["date_naissance"];

    $date_naissance = validateDate($date_naissance_raw);
    if (!$date_naissance) {
        echo "Erreur : Format de date non valide.";
        exit();
    }

    include('config.php');

    $insert_query = "INSERT INTO Cueilleurs (nom, genre, date_naissance)
                     VALUES (?, ?, ?)";

    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("sss", $nom, $genre, $date_naissance);

    if ($stmt->execute()) {
        header("Location: dashboard.php"); // Rediriger vers le tableau de bord après l'insertion
        exit();
    } else {
        echo "Erreur lors de l'insertion : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

function validateDate($date)
{
    $format = 'Y-m-d';
    $dateObj = DateTime::createFromFormat($format, $date);
    return $dateObj && $dateObj->format($format) === $date;
}
?>
