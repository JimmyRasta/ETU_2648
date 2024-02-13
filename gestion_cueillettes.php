<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Cueillettes</title>
    <!-- Intégration de Bootstrap pour améliorer le style -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Gestion des Cueillettes</h2>

        <!-- Formulaire de gestion des cueillettes -->
        <form action="insert_cueillettes.php" method="post">
            <!-- Ajoutez ici les champs nécessaires pour la gestion des cueillettes -->
            <!-- Exemple : -->
            <div class="form-group">
                <label for="date_cueillette">Date de Cueillette</label>
                <input type="date" class="form-control" name="date_cueillette" required>
            </div>

            <div class="form-group">
                <label for="quantite_cueillie">Quantité Cueillie (en kg)</label>
                <input type="number" class="form-control" name="quantite_cueillie" required>
            </div>

            <!-- Ajoutez d'autres champs nécessaires -->

            <button type="submit" class="btn btn-primary">Enregistrer Cueillette</button>
        </form>

        <!-- Autres éléments de gestion des cueillettes -->

    </div>

    <!-- Intégration de Bootstrap JS pour améliorer les fonctionnalités -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
