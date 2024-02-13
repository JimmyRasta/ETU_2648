<?php
include('check_permissions.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date_raw = $_POST["date"];

    $date = validateDate($date_raw);
    if (!$date) {
        echo "Erreur : Format de date non valide.";
        exit();
    }

    $cueilleur_id = intval($_POST["cueilleur_id"]);
    $parcelle_id = intval($_POST["parcelle_id"]);
    $poids_cueilli = floatval($_POST["poids_cueilli"]);

    include('config.php');

    $insert_query = "INSERT INTO Cueillettes (date, cueilleur_id, parcelle_id, poids_cueilli)
                     VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("sddd", $date, $cueilleur_id, $parcelle_id, $poids_cueilli);

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
