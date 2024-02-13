<?php include('check_permissions.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Cueilleurs</title>
</head>

<body>
    <div class="container">
        <h2>Gestion des Cueilleurs</h2>

        <form method="post" action="insert_cueilleur.php">
            <label for="nom">Nom du cueilleur:</label>
            <input type="text" name="nom" required>

            <label for="genre">Genre:</label>
            <select name="genre" required>
                <option value="Homme">Homme</option>
                <option value="Femme">Femme</option>
            </select>

            <label for="date_naissance">Date de naissance:</label>
            <input type="date" name="date_naissance" required>

            <button type="submit">Ajouter le cueilleur</button>
        </form>

        <a href="dashboard.php">Retour au tableau de bord</a>
    </div>
</body>

</html>
