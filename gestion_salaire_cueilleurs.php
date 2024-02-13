<?php include('check_permissions.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuration du Salaire des Cueilleurs</title>
</head>

<body>
    <div class="container">
        <h2>Configuration du Salaire des Cueilleurs</h2>

        <form method="post" action="update_salaire_cueilleurs.php">
            <label for="cueilleur_id">Cueilleur:</label>
            <select name="cueilleur_id" required>
                <!-- Récupérez la liste des cueilleurs depuis la base de données -->
                <?php
                include('config.php');

                $cueilleurs_query = "SELECT id, nom FROM Cueilleurs";
                $result = $conn->query($cueilleurs_query);

                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nom'] . "</option>";
                }

                $conn->close();
                ?>
            </select>

            <label for="montant_par_kg">Montant par kg:</label>
            <input type="text" name="montant_par_kg" required>

            <button type="submit">Enregistrer</button>
        </form>

        <a href="dashboard.php">Retour au tableau de bord</a>
    </div>
</body>

</html>
