<?php include('check_permissions.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Catégories de Dépenses</title>
</head>

<body>
    <div class="container">
        <h2>Gestion des Catégories de Dépenses</h2>

        <form method="post" action="insert_categorie_depense.php">
            <label for="categorie">Catégorie de dépense:</label>
            <input type="text" name="categorie" required>

            <button type="submit">Ajouter la catégorie</button>
        </form>

        <a href="dashboard.php">Retour au tableau de bord</a>
    </div>
</body>

</html>
