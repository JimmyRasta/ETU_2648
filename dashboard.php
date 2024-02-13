<?php include('check_permissions.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Bienvenue dans le Tableau de Bord</h2>

        <div class="mt-4">
            <h4>Fonctionnalités :</h4>
            <ul>
                <li><a href="gestion_formulaires.php">Gestion des Utilisateurs</a></li>
            </ul>
        </div>

        <!-- Déconnexion -->
        <div class="mt-5">
            <a href="logout.php" class="btn btn-danger">Déconnexion</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

