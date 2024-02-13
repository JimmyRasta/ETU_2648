<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats</title>
</head>

<body>

    <h2>Résultats</h2>

    <form method="post" action="resultats.php">
        <label for="date_debut">Date de début :</label>
        <input type="date" name="date_debut" required>

        <label for="date_fin">Date de fin :</label>
        <input type="date" name="date_fin" required>

        <button type="submit">Calculer</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gestion_the";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Échec de la connexion à la base de données: " . $conn->connect_error);
        }

        $dateDebut = $_POST['date_debut'];
        $dateFin = $_POST['date_fin'];

        $sql = "SELECT SUM(poids) AS poids_total FROM cueillettes WHERE date BETWEEN ? AND ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $dateDebut, $dateFin);
        $stmt->execute();
        $stmt->bind_result($poidsTotal);
        $stmt->fetch();
        $stmt->close();

        $sql = "SELECT SUM(poids_restant) AS poids_restant FROM parcelles WHERE date = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $dateFin);
        $stmt->execute();
        $stmt->bind_result($poidsRestant);
        $stmt->fetch();
        $stmt->close();

        $coutRevientParKg = $poidsTotal > 0 ? $poidsRestant / $poidsTotal : 0;

        echo "<p>Poids total de la cueillette : " . $poidsTotal . " kg</p>";
        echo "<p>Poids restant sur les parcelles à la date de fin : " . $poidsRestant . " kg</p>";
        echo "<p>Coût de revient par kg : " . $coutRevientParKg . " euros/kg</p>";

        $conn->close();
    }
    ?>

</body>

</html>
