<?php include('check_permissions.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Variétés de Thé</title>
</head>

<body>
    <div class="container">
        <h2>Gestion des Variétés de Thé</h2>

        <form method="post" action="insert_variete.php">
            <label for="nom">Nom de la variété:</label>
            <input type="text" name="nom" required>

            <label for="occupation_m2">Occupation (m² par pied):</label>
            <input type="number" name="occupation_m2" step="0.1" required>

            <label for="rendement_kg_par_mois">Rendement (kg par mois):</label>
            <input type="number" name="rendement_kg_par_mois" step="0.1" required>

            <button type="submit">Ajouter la variété</button>
        </form>

        <a href="dashboard.php">Retour au tableau de bord</a>
    </div>
</body>

</html>
