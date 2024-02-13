<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Dépenses</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Gestion des Dépenses</h2>

        <form action="insert_depenses.php" method="post">

            <div class="form-group">
                <label for="date_depense">Date de Dépense</label>
                <input type="date" class="form-control" name="date_depense" required>
            </div>

            <div class="form-group">
                <label for="montant_depense">Montant de la Dépense</label>
                <input type="number" class="form-control" name="montant_depense" required>
            </div>

            <!-- Ajoutez d'autres champs nécessaires -->

            <button type="submit" class="btn btn-primary">Enregistrer Dépense</button>
        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
