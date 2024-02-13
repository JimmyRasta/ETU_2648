<?php
include('check_permissions.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date_raw = $_POST["date"];

    $date = validateDate($date_raw);
    if (!$date) {
        echo "Erreur : Format de date non valide.";
        exit();
    }

    $categorie_id = intval($_POST["categorie_id"]);
    $montant = floatval($_POST["montant"]);

    include('config.php');

    $insert_query = "INSERT INTO Depenses (date, categorie_id, montant)
                     VALUES (?, ?, ?)";

    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("sdd", $date, $categorie_id, $montant);

    if ($stmt->execute()) {
        header("Location: dashboard.php"); 
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
