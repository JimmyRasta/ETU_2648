<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saisie des Dépenses</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1>Saisie des Dépenses</h1>
    </header>

    <main>
        <form action="traitement_depenses.php" method="post">
            <label for="date">Date :</label>
            <input type="date" id="date" name="date" required>

            <label for="categorie">Catégorie de Dépense :</label>
            <select id="categorie" name="categorie" required>
                <!-- Options pour les catégories de dépenses -->
                <option value="categorie1">Catégorie 1</option>
                <option value="categorie2">Catégorie 2</option>
                <!-- Ajoutez d'autres catégories si nécessaire -->
            </select>

            <label for="montant">Montant (en euros) :</label>
            <input type="number" id="montant" name="montant" step="0.01" required>

            <button type="submit">Valider</button>
        </form>
    </main>

    <footer>
        <!-- Ajoutez des informations de pied de page si nécessaire -->
    </footer>
</body>

</html>
