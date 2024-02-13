<?php include('check_permissions.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Parcelles</title>
</head>

<body>
    <div class="container">
        <h2>Gestion des Parcelles</h2>

        <form method="post" action="insert_parcelle.php">
            <label for="numero">Numéro de parcelle:</label>
            <input type="text" name="numero" required>

            <label for="surface_hectares">Surface (en hectares):</label>
            <input type="number" name="surface_hectares" step="0.01" required>

            <label for="variete_id">Variété de thé planté:</label>
            <select name="variete_id" required>
                <?php
                include('config.php');

                $query_varietes = "SELECT id, nom FROM VarietesDeThe";
                $result_varietes = $conn->query($query_varietes);

                while ($row_variete = $result_varietes->fetch_assoc()) {
                    echo "<option value='" . $row_variete['id'] . "'>" . $row_variete['nom'] . "</option>";
                }

                $conn->close();
                ?>
            </select>

            <button type="submit">Ajouter la parcelle</button>
        </form>

        <a href="dashboard.php">Retour au tableau de bord</a>
    </div>
</body>

</html>